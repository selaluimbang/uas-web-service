<?php

	//---- Parts

	$app->post('/parts/tambah_data', 'auth', function() use ($app) {
		try{
			$db = getConnection();	
			$app -> response() -> header('Content-Type', 'application/json');
			
			$request = $app -> request();
			$laptop_id = $request->post('laptop_id');
			$categories_id = $request->post('categories_id');
			$parts_number = $request->post('parts_number');
			$description = $request->post('description');	
			$tambahParts = "insert into t_parts values('','".$laptop_id."','".$categories_id."','".$parts_number."','".$description."')";
			$stmtTambahParts = $db->query($tambahParts);

			if($stmtTambahParts){
				$result = array("status" => "1", "message" => "Berhasil Menambahkan!");
				echo json_encode($result);
			}else{
				$result = array("status" => "0", "message" => "Tidak Berhasil Menambahkan!");
				echo json_encode($result);
			}

		}		
		catch(Exception $e) {
			echo json_encode($e->getMessage());
		}	
		
	});

	$app->post('/parts/ubah_data', 'auth', function() use ($app) {
		try{
			$db = getConnection();	
			$app -> response() -> header('Content-Type', 'application/json');
			
			$request = $app -> request();
			$parts_id = $request->post('parts_id');
			$laptop_id = $request->post('laptop_id');
			$categories_id = $request->post('categories_id');
			$parts_number = $request->post('parts_number');
			$description = $request->post('description');			
			$ubahParts = "update t_parts set parts_id='".$parts_id."', laptop_id='".$laptop_id."' , categories_id='".$categories_id."', parts_number='".$parts_number."' , description='".$description."' where parts_id=".$parts_id."";
			$stmtUbahParts = $db->query($ubahParts);

			if($stmtUbahParts){
				$result = array("status" => "1", "message" => "Berhasil Mengubah!");
				echo json_encode($result);
			}else{
				$result = array("status" => "0", "message" => "Tidak Berhasil Mengubah!");
				echo json_encode($result);
			}

		}		
		catch(Exception $e) {
			echo json_encode($e->getMessage());
		}	
		
	});

	$app->post('/parts/hapus_data', 'auth', function() use ($app) {
		try{
			$db = getConnection();	
			$app -> response() -> header('Content-Type', 'application/json');
			
			$request = $app -> request();
			$parts_id = $request->post('parts_id');			
			$hapusParts = "delete from t_parts where parts_id=".$parts_id."";
			$stmtHapusParts = $db->query($hapusParts);

			if($stmtHapusParts){
				$result = array("status" => "1", "message" => "Berhasil Menghapus!");
				echo json_encode($result);
			}else{
				$result = array("status" => "0", "message" => "Tidak Berhasil Menghapus!");
				echo json_encode($result);
			}

		}		
		catch(Exception $e) {
			echo json_encode($e->getMessage());
		}	
		
	});

	$app->get('/parts/lihat_data','auth', function() use($app){
	try{
		$db = getConnection();
		$app -> response() -> header('Content-Type','application/json');
		
		$lihatParts = "select * from t_parts";
		$stmtLihatParts = $db->query($lihatParts);
		$result = array("status"=>"1","Parts" => $stmtLihatParts->fetchAll(PDO::FETCH_OBJ));
		echo json_encode($result);
		
	}catch(Excecption $e){
		echo json_encode($e->getMessage());
	}

	});

	$app->get('/parts/lihat_data/by_jenislaptop/:laptop_id','auth', function($laptop_id) use($app){
	try{
		$db = getConnection();
		$app -> response() -> header('Content-Type','application/json');
		
		$lihatParts = "select * from t_parts where laptop_id='".$laptop_id."'";
		$stmtLihatParts = $db->query($lihatParts);
		$result = array("status"=>"1","Parts" => $stmtLihatParts->fetchAll(PDO::FETCH_OBJ));
		echo json_encode($result);
		
	}catch(Excecption $e){
		echo json_encode($e->getMessage());
	}

	});

	$app->get('/parts/lihat_data/lihat_semua','auth', function() use($app){
	try{
		$db = getConnection();
		$app -> response() -> header('Content-Type','application/json');
		
		$lihatParts = "SELECT t_parts.parts_id, t_parts.laptop_id, 
						t_laptops.brand, t_laptops.model, t_laptops.release_years, 
						t_parts.categories_id, t_parts_categories.categories_name, t_parts.parts_number, t_parts.description
						FROM t_parts, t_laptops, t_parts_categories
						WHERE t_parts.laptop_id = t_laptops.laptop_id
						AND t_parts.categories_id = t_parts_categories.categories_id";
		$stmtLihatParts = $db->query($lihatParts);
		$result = array("status"=>"1","Parts" => $stmtLihatParts->fetchAll(PDO::FETCH_OBJ));
		echo json_encode($result);
		
	}catch(Excecption $e){
		echo json_encode($e->getMessage());
	}

	});

	$app->get('/parts/lihat_data/by_jeniskategori/:categories_id','auth', function($categories_id) use($app){
	try{
		$db = getConnection();
		$app -> response() -> header('Content-Type','application/json');
		
		$lihatParts = "select * from t_parts where categories_id='".$categories_id."'";
		$stmtLihatParts = $db->query($lihatParts);
		$result = array("status"=>"1","Parts" => $stmtLihatParts->fetchAll(PDO::FETCH_OBJ));
		echo json_encode($result);
		
	}catch(Excecption $e){
		echo json_encode($e->getMessage());
	}

	});


?>