<?php

// ---- Laptops 

	$app->post('/laptop/tambah_data', 'auth', function() use ($app) {
		try{
			$db = getConnection();	
			$app -> response() -> header('Content-Type', 'application/json');
			
			$request = $app -> request();
			$brand = $request->post('brand');
			$model = $request->post('model');
			$release_years = $request->post('release_years');				
			$tambahLaptop = "insert into t_laptops values('','".$brand."','".$model."','".$release_years."')";
			$stmtTambahLaptop = $db->query($tambahLaptop);

			if($stmtTambahLaptop){
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

	$app->post('/laptop/ubah_data', 'auth', function() use ($app) {
		try{
			$db = getConnection();	
			$app -> response() -> header('Content-Type', 'application/json');
			
			$request = $app -> request();
			$laptop_id = $request->post('laptop_id');
			$brand = $request->post('brand');
			$model = $request->post('model');
			$release_years = $request->post('release_years');				
			$ubahLaptop = "update  t_laptops set laptop_id='".$laptop_id."', brand='".$brand."', model='".$model."', release_years='".$release_years."' where laptop_id=".$laptop_id."";
			$stmtUbahLaptop = $db->query($ubahLaptop);

			if($stmtUbahLaptop){
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

	$app->post('/laptop/hapus_data', 'auth', function() use ($app) {
		try{
			$db = getConnection();	
			$app -> response() -> header('Content-Type', 'application/json');
			
			$request = $app -> request();
			$laptop_id = $request->post('laptop_id');			
			$hapusLaptop = "delete from 	t_laptops where laptop_id=".$laptop_id."";
			$stmtHapusLaptop = $db->query($hapusLaptop);

			if($stmtHapusLaptop){
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

	$app->get('/laptop/lihat_data','auth', function() use($app){
	try{
		$db = getConnection();
		$app -> response() -> header('Content-Type','application/json');
		
		$lihatLaptop = "select * from t_laptops";
		$stmtLihatLaptop = $db->query($lihatLaptop);
		$result = array("status"=>"1","Laptops" => $stmtLihatLaptop->fetchAll(PDO::FETCH_OBJ));
		echo json_encode($result);
		
	}catch(Excecption $e){
		echo json_encode($e->getMessage());
	}

});

	//--- Categories

	$app->post('/categories/tambah_data', 'auth', function() use ($app) {
		try{
			$db = getConnection();	
			$app -> response() -> header('Content-Type', 'application/json');
			
			$request = $app -> request();
			$categories_name = $request->post('categories_name');	
			$tambahCategories = "insert into t_parts_categories values('','".$categories_name."')";
			$stmtTambahCategories = $db->query($tambahCategories);

			if($stmtTambahCategories){
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

	$app->post('/categories/ubah_data', 'auth', function() use ($app) {
		try{
			$db = getConnection();	
			$app -> response() -> header('Content-Type', 'application/json');
			
			$request = $app -> request();
			$categories_id = $request->post('categories_id');
			$categories_name = $request->post('categories_name');				
			$ubahCategories = "update  t_parts_categories set categories_id='".$categories_id."', categories_name='".$categories_name."' where categories_id=".$categories_id."";
			$stmtUbahCategories = $db->query($ubahCategories);

			if($stmtUbahCategories){
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

	$app->post('/categories/hapus_data', 'auth', function() use ($app) {
		try{
			$db = getConnection();	
			$app -> response() -> header('Content-Type', 'application/json');
			
			$request = $app -> request();
			$categories_id = $request->post('categories_id');			
			$hapusCategories = "delete from t_parts_categories where categories_id=".$categories_id."";
			$stmtHapusCategories = $db->query($hapusCategories);

			if($stmtHapusCategories){
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

	$app->get('/categories/lihat_data','auth', function() use($app){
	try{
		$db = getConnection();
		$app -> response() -> header('Content-Type','application/json');
		
		$lihatCategories = "select * from t_parts_categories";
		$stmtLihatCategories = $db->query($lihatCategories);
		$result = array("status"=>"1","Categories" => $stmtLihatCategories->fetchAll(PDO::FETCH_OBJ));
		echo json_encode($result);
		
	}catch(Excecption $e){
		echo json_encode($e->getMessage());
	}

});


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

?>