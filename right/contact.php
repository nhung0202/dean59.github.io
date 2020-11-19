<?php
  header("Content-type: text/html; charset=utf-8");
	$localhostname='localhost';
	$accoutname='root';
	$pass='';
	$database='nhung';
	$conn=mysqli_connect($localhostname,$accoutname,$pass,$database);
  mysqli_set_charset($conn, 'UTF8');
?>
		    <div class="clear"> </div>
		    <div class="wrap">
		    <div class="content">
		    	<div class="section group">				
				<div class="col span_1_of_3">
					<div class="contact_info">
			    	 	<h2>Địa chỉ cửa hàng</h2>
			    	 		<div class="map">
					   			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3728.625630299457!2d106.6871202144423!3d20.846818699341448!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a7a904b433e83%3A0x75e361cf4f40e2e5!2zNTYgTmfDtSA3MiBM4bqhY2ggVHJheSwgTOG6oWNoIFRyYXksIE5nw7QgUXV54buBbiwgSOG6o2kgUGjDsm5nLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1605469691663!5m2!1svi!2s" width="1000" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
					   			<small><a href="<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3728.625630299457!2d106.6871202144423!3d20.846818699341448!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a7a904b433e83%3A0x75e361cf4f40e2e5!2zNTYgTmfDtSA3MiBM4bqhY2ggVHJheSwgTOG6oWNoIFRyYXksIE5nw7QgUXV54buBbiwgSOG6o2kgUGjDsm5nLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1605469691663!5m2!1svi!2s width="1000" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>View Larger Map</a></small>
					   		</div>
      				</div>
      			<div class="company_address">
				     	<h2>Thông tin cửa hàng :</h2>
						    	<p>số 56, ngõ 72 Lạch Tray, phường Lạch Tray, quận Ngô Quyền, Thành Phố Hải Phòng.</p>
				   		<p>Phone:03547164664</p>
				   		<p>Fax: (000) 000 00 00 0</p>
				 	 	<p>Email: <span><a href="#">trangtran0599@gmail.com</a></span></p>
				   		<p>Follow on: <span><a href="#">Facebook</a></span>, <span><a href="#">Twitter</a></span></p>
				   </div>
				</div>				
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h2>Contact Us</h2>
					    <form>
					    	<div>
						    	<span><label>Tên *
						    	<?php 
                                    if(isset($errors) && in_array('name',$errors)) {
                                    echo "<span class='warning'>Please enter your name.</span>";
                                }
                                ?>
                                </label></span>
						    	<span><input type="text" value="<?php if(isset($_POST['name'])) {echo htmlentities($_POST['name'], ENT_COMPAT, 'UTF-8');} ?>"></span>
						    </div>
						    <div>
						    	<span><label>E-MAIL
                            <?php 
                            if(isset($errors) && in_array('email',$errors)) {
                                echo "<span class='warning'>Please enter your email.</span>";
                                }
                            ?>
                                </label></span>
						    	<span><input type="text" value="<?php if(isset($_POST['email'])) {echo htmlentities($_POST['email'], ENT_COMPAT, 'UTF-8');} ?>"></span>
						    </div>
						    <div>
						     	<span><label>SĐT
						     	<?php 
                                if(isset($errors) && in_array('phone_number',$errors)) {
                                echo "<span class='warning'>Please enter your phone number.</span>";
                                }
                                ?>
                                 </label></span>
						    	<span><input type="text" value="<?php if(isset($_POST['email'])) {echo htmlentities($_POST['phone_number'], ENT_COMPAT, 'UTF-8');} ?>"></span>
						    </div>
						    <div>
						    	<span><label>NỘI DUNG
						    	<?php 
                                if(isset($errors) && in_array('comment',$errors)) {
                                echo "<span class='warning'>Please enter your message.</span>";
                                }
                                ?>
                                </label></span>
                                <div id="comment"><textarea name="comment" rows="10" cols="45" tabindex="3"><?php if(isset($_POST['comment'])) {echo htmlentities($_POST['comment'], ENT_COMPAT, 'UTF-8');} ?></textarea>
                                </div>						   
                            </div>
						    <div>
						   		<span><input type="submit" value="Submit"></span>
						    </div>
					    </form>
				    </div>
  				</div>				
			  </div>
			  	 <div class="clear"> </div>
	</div>
	<div class="clear"> </div>
		    </div>
		    </div>
