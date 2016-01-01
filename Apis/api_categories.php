<?php
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




?>