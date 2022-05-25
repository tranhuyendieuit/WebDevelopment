<?php 
	class usermodel extends DB {

		public function get(){

			$sql ="SELECT *FROM users";
			return mysqli_query($this->con,$sql);
		}
		public function insert($name,$Dia_Chi,$So_Dien_Thoai,$email,$password){

			$sql = "INSERT INTO users (`name`, `Dia_Chi`, `So_Dien_Thoai`, `email`,`password`) VALUES('$name','$Dia_Chi','$So_Dien_Thoai','$email','$password')";
				$result = false;
			if (mysqli_query($this->con,$sql)) {
				$result = true;
			}
			return json_encode($result);
		}

		public function max($email){
			$sql ="SELECT *FROM users where email ='{$email}'";
			return mysqli_query($this->con,$sql);
		}
		public function edit($id){
			$sql ="SELECT *FROM users where id=$id";
			return mysqli_query($this->con,$sql);
		}
		public function update($id,$name,$Dia_Chi,$So_Dien_Thoai){
			$sql ="UPDATE `users` SET `name`='$name',`Dia_Chi`='$Dia_Chi',`So_Dien_Thoai`='$So_Dien_Thoai' WHERE id =$id";
			$result = false;
			if (mysqli_query($this->con,$sql)) {
				$result = true;
			}
			return json_encode($result);
		}
		public function delete($id){
			$sql ="DELETE FROM users where id = $id";
			$result = false;
			if (mysqli_query($this->con,$sql)) {
				$result = true;
			}
			return json_encode($result);
		}
		 public function news_pass($email,$re_new_pass){
        $sql ="UPDATE `users` SET `password`='$re_new_pass' WHERE email ='$email'";
         $result= false;
        if(mysqli_query($this->con,$sql)){
            $result = true;
        }
        return json_encode($result);
	}
	}
 ?>