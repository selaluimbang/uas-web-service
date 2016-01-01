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

$app->get('/laptop/lihat_data/by_tahunrilis/:release_years','auth', function($release_years) use($app){
	try{
		$db = getConnection();
		$app -> response() -> header('Content-Type','application/json');
		
		$lihatLaptop = "select * from t_laptops where release_years='".$release_years."'";
		$stmtLihatLaptop = $db->query($lihatLaptop);
		$result = array("status"=>"1","Parts" => $stmtLihatLaptop->fetchAll(PDO::FETCH_OBJ));
		echo json_encode($result);
		
	}catch(Excecption $e){
		echo json_encode($e->getMessage());
	}

	});


?>