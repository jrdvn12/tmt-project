<?php 

defined("ABSPATH") ? "":die();

//capture ajax data
$raw_data = file_get_contents("php://input");
if(!empty($raw_data))
{

	$OBJ = json_decode($raw_data,true);
	if(is_array($OBJ))
	{
		if($OBJ['data_type'] == "search")
		{

			$productClass = new Product();
			$limit = 20;

			if(!empty($OBJ['text']))
			{
				//search
				$barcode = $OBJ['text'];
				$text = "%".$OBJ['text']."%";
				$query = "select * from products where description like :find || barcode = :barcode order by views desc limit $limit";
				$rows = $productClass->query($query,['find'=>$text,'barcode'=>$barcode]);

			}else{
				//get all
				//$limit = 10,$offset = 0,$order = "desc",$order_column = "id"
				$rows = $productClass->getAll($limit,0,'desc','views');
			}
			
			if($rows){

				foreach ($rows as $key => $row) {
					
					$rows[$key]['description'] = strtoupper($row['description']);
					$rows[$key]['image'] = crop($row['image']);
				}

				$info['data_type'] = "search";
				$info['data'] = $rows;
				
				echo json_encode($info);

			}

		}
		else
		if($OBJ['data_type'] == "checkout")
		{

			$data 		= $OBJ['text'];
			$receipt_no 	= get_receipt_no();
			$user_id 	= auth("id");
			$date 		= date("Y-m-d H:i:s");
			$payment_method = $OBJ['payment_status'];
			$payment_reference = $OBJ['payment_reference'];
			$db = new Database();

			//read from database
			foreach ($data as $row) {
				
				$arr = [];
				$arr['id'] = $row['id'];
				$query = "select * from products where id = :id limit 1";
				$check = $db->query($query,$arr);

				if(is_array($check))
				{
					$check = $check[0];

					//save to database
					$arr = [];
					$arr['barcode'] 	= $check['barcode'];
					$arr['description'] = $check['description'];
					$arr['amount'] 		= $check['amount'];
					$arr['qty'] 		= $row['qty'];
					$arr['total'] 		= $row['qty'] * $check['amount'];
					$arr['receipt_no'] 	= $receipt_no;
					$arr['date'] 		= $date;
					$arr['user_id'] 	= $user_id;
					$arr['payment_method'] 	= $payment_method . ' '.$payment_reference ;

					$query = "insert into sales (barcode,receipt_no,description,qty,amount,total,date,user_id,payment_method) values (:barcode,:receipt_no,:description,:qty,:amount,:total,:date,:user_id,:payment_method)";
					$db->query($query,$arr);

					//add view count for this product
					$query = "update products set views = views + 1 where id = :id limit 1";
					$db->query($query,['id'=>$check['id']]);

					//subtract quantity for this product
					$query = "UPDATE products SET stock = stock - :qty WHERE id = :id LIMIT 1";
    				$db->query($query, ['id' => $check['id'], 'qty' => $row['qty']]);

					
				}

			}

			//barcode 	recipt_no 	description 	qty 	amount 	total 	date 	user_id 

			$info['data_type'] = "checkout";
			$info['data'] = "items saved successfully!";
				
			echo json_encode($info);
		}

	}

}



