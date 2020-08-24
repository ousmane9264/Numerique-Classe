<div class="col-lg-3 col-md-4 pd-left-none no-pd">
    <div class="main-left-sidebar no-margin">
        <div class="user-data full-width">
            <div class="user-profile">
                <div class="username-dt">
                    @php
                        $id_user = Session::get('id_user');
                        $photos = DB::table('authentifications')->where('id_user',$id_user)->first();
                    @endphp
                    <div class="user-pro-img">
                    <img src="{{ asset('upload/user_images/'.$photos->photo) }}" alt="">
                        <div class="add-dp" id="OpenImgUpload">
                        </div>
                    </div>
                </div><!--username-dt end-->
                <div class="user-specs">
                    <h3>{{ Session::get('prenom').' '. Session::get('nom') }}</h3>
                    <span>{{ Session::get('email') }}</span>
                </div>
            </div><!--user-profile end-->
            <ul class="user-fw-status">
                <li>
                    <h4>Téléphone</h4>
                    <span>{{ Session::get('phone') }}</span>
                </li>
               @php
                   $id_user = Session::get('id_user');
               @endphp
                <li>
                    <a href="{{ url('show-user/'.$id_user) }}" title="">Voir Profile</a>
                </li>
            </ul>
        </div><!--user-data end-->
    </div><!--main-left-sidebar end-->
</div>