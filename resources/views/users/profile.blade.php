@extends('layouts.home_user')
@section('content')

<div class="col-md-12">
	<div class="main-ws-sec">
		<div class="user-tab-sec">
			<h3>{{ Session::get('prenom').' '.Session::get('nom') }}</h3>
		</div><!--user-tab-sec end-->
		<div class="product-feed-tab current" id="feed-dd">
			<div class="posts-section">
				@php
					$id_user = Session::get('id_user');
				@endphp
				<form action="{{ url('edit-user/'.$id_user) }}" method="post" enctype="multipart/form-data">
					@csrf
				<div class="post-bar">
					<div class="post_topbar">
						<div class="usy-dt">
							<div class="usy-name">
								<h3 style="margin-left: 200px;">Modifier les informations</h3>
							</div>
						</div>
					</div><br>
					<div class="job_descp">
						<div class="row">
							<div class="col-lg-12 no-pdd">
								<div class="sn-field">
									<input type="text" class="form-control" value="{{ $user->nom }}" name="nom">
								</div><!--sn-field end-->
							</div>
							<div class="col-lg-12 no-pdd">
								<div class="sn-field">
									<input type="text"  class="form-control" value="{{ $user->prenom }}" name="prenom">
								</div>
							</div>
							<div class="col-lg-12 no-pdd">
								<div class="sn-field">
									<input type="text"  class="form-control" value="{{ $user->phone }}" name="phone">
								</div>
							</div>
							<div class="col-lg-12 no-pdd">
								<div class="sn-field">
									<input type="email"  class="form-control" value="{{ $user->email }}" name="email">
								</div>
							</div>
							<div class="row col-md-12">
								<div class="col-lg-5 no-pdd">
									<div class="sn-field">
										<input type="password" placeholder="Mot de passe"  class="form-control" value="" name="passord">
									</div>
								</div>&nbsp;
								<div class="col-lg-6 no-pdd">
									<div class="sn-field">
										<input type="password" placeholder="Confirmation mot de passe"  class="form-control" value="" name="confirm_pas">
									</div>
								</div>
							</div>

							<div class="row col-md-12">
								<div class="col-lg-10 no-pdd">
									<label>Modifier votre photo de profile</label>
									<div class="sn-field">
										<input type="file" class="form-control" value="{{$user->photo}}" name="photo">
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div><!--post-bar end-->
				<div class="post-bar">
					<button type="submit" class="btn btn-primary pull-right">Modifier</button>
					<h3 class="text-center"><b>Ajouter vos informations suplementaires</b></h3><br>
						<br>
						<div class="row">
							<div class="col-lg-5 no-pdd">
								<label class="form-label">Date de Naissance</label>
								<div class="sn-field">
									<input type="date" class="form-control" value="{{$user->date_nais}}"  name="date_nais">
								</div><!--sn-field end-->
							</div> &nbsp;
							<div class="col-lg-6 no-pdd">
								<label class="form-label">Lieu de Naissance</label>
								<div class="sn-field">
									<input type="text" class="form-control" value="{{$user->lieu_nais}}"  name="lieu_nais">
								</div><!--sn-field end-->
							</div>
						</div>
						<div class="row">
							@php
								$villes = DB::table('villes')->get();
								$pays = DB::table('pays')->get();
							@endphp
							<div class="col-lg-5 no-pdd">
								<label class="form-label">Pays</label><br>
								<div class="sn-field">
									<select class="form-control" name="id_pay">
										@foreach($pays as $pay)
											<option value="{{ $pay->id_pay }}" >{{ $pay->pays }}</option>
										@endforeach
									</select>
									<span><i class="fa fa-ellipsis-h"></i></span>
									
								</div><!--sn-field end-->
							</div> &nbsp;
							<div class="col-lg-6 no-pdd">
								<label class="form-label">Ville</label><br>
								<div class="sn-field">
									<select class="form-control" name="id_ville">
										@foreach($villes as $ville)
											<option value="{{ $ville->id_ville }}" >{{ $ville->ville }}</option>
										@endforeach
									</select>
								</div><!--sn-field end-->
							</div>
						</div>

						<div class="row">
							<div class="col-lg-5 no-pdd">
								<label class="form-label">Situation Matrimoriale</label><br>
								<div class="sn-field">
									<select class="form-control" name="situation">
										<option value="Marie" >Marié</option>
										<option value="Celibataire">Célibataire</option>
										<option value="Autres">Autres</option>
									</select>
									<span><i class="fa fa-ellipsis-h"></i></span>
								</div><!--sn-field end-->
							</div> &nbsp;
							<div class="col-lg-5 no-pdd">
								<label class="form-label">Genre</label><br>
								<div class="sn-field">
									<select class="form-control" name="genre">
										<option value="M" >Home</option>
										<option value="F">Femme</option>
									</select>
									<span><i class="fa fa-ellipsis-h"></i></span>
								</div><!--sn-field end-->
							</div> &nbsp;
						</div>
						<div class="col-lg-12 no-pdd">
							<label class="form-label">Profession</label>
							<div class="sn-field">
								<input type="text" class="form-control" value="{{$user->profession}}" placeholder="Profession" name="profession">
							</div><!--sn-field end-->
						</div>
					</form>
					
				</div><!--post-bar end-->
			</div><!--posts-section end-->
		</div><!--product-feed-tab end-->
	</div><!--main-ws-sec end-->
</div>
@stop