@extends('layouts.main')

@section('contents')
	<div id="area-book-list" class="area content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="header">
            	<h4 class="title">Register a new book</h4>
						</div>
						<div class="content">
							<form method="post" action="{{ url('/library/bookRegister')}}">
                 {{ csrf_field() }}
                <div class="form-group">
                  <label for="InputNewDrinkName" class = "changeColorW changeFontB">Book's Name</label>
                  <input type="text" class="form-control" id="newBookName" name="InputNewBookName" aria-describedby="nameHelp" placeholder="Name of the book you want to register (Within 40 characters)">
                </div>
								<button type="submit" class="btn btn-success" id="registerBtn">Register</button>
								<!-- <button type="button" class="btn btn-success" id="registerBtn">Register</button> -->
							</form>
							<br>
							<h7 class="title">※: Books with 40 or more letters can not be registered.Please be careful.</h7><br>
							<h7 class="title"> 　 if you want to register more than 40 letters, please contact the administrator.</h7>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- <footer class="footer">
		<div class="container-fluid">
			<nav class="pull-left">
			</nav>
			<div class="copyright pull-right">
				&copy;
				<script>document.write(new Date().getFullYear())</script>
			</div>
		</div>
	</footer> -->

@endsection
