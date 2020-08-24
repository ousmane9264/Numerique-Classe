<!DOCTYPE html>
<html>
<head>
    @include('layouts.links')
</head>
<body oncontextmenu="return false;">    
    <div class="wrapper">   
       @include('layouts.header')
        <main>
    <div class="main-section">
        <div class="container">
            <div class="main-section-data">
                <div class="row">
                    @include('layouts.profil_gauch')
                    <div class="col-lg-6 col-md-8 no-pd">
                        <div class="main-ws-sec">
                            <div class="card">
                            @php
                                $id_user = Session::get('id_user');
                                $photos = DB::table('authentifications')
                                ->where('id_user',$id_user)->first();
                            @endphp
                            <form action="{{ URL::to('/save-pub') }}" method="post">
                                @csrf
                                 <div class="card-body">
                                     <div class="form-row">
                                         <div class="form-group col-lg-2">
                                            <div class="user-picy">
                                              <img src="{{asset('upload/user_images/'.$photos->photo) }}" alt="">
                                            </div>
                                         </div>
                                         <div class="form-group col-lg-10">
                                            <textarea class="form-control" name="contenu" cols="50" rows="3" placeholder="ECRIVEZ QUELQUE CHOSE"></textarea>
                                         </div>
                                         <button type="file" class="btn btn-success">
                                        <i class="fas fa-images">Publier</i>
                                    </button>
                                     </div>
                                     <hr>
                                    <ul>
                                        <div class="form-row">
                                            <div class="col-lg-12">
                                                 <li>
                                                    <button type="file" class="btn btn-secondary">
                                                        <i class="fa fa-camera"></i> 
                                                        Ajouter Vidéo
                                                    </button> &nbsp;&nbsp;

                                                    <button type="file" class="btn btn-secondary">
                                                        <i class="fas fa-images"></i>
                                                         Ajouter Photos 
                                                    </button>&nbsp;&nbsp;

                                                      <a href="">
                                                        <i class="fas fa-images"></i>
                                                        emoji
                                                    </a>
                                                </li>
                                            </div>
                                          
                                            <!-- <div class="col-lg-2">
                                                 <li>
                                                    <a href="" class="btn btn-secondary">
                                                        <i class="fas fa-images"></i>
                                                    </a>
                                                </li>
                                            </div> -->
                                        </div>
                                    </ul>
                                 </div>
                            </form>
                        </div>
                        <br>      
                            @include('layouts.center')
                        </div><!--main-ws-sec end-->
                    </div>
                    @include('layouts.profil_droit')
                </div>
            </div><!-- main-section-data end-->
        </div> 
    </div>
</main>
</div><!--theme-layout end-->
    



<script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/popper.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.mCustomScrollbar.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/lib/slick/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/scrollbar.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/script.js') }}"></script>

</body>

<!-- Mirrored from gambolthemes.net/workwise-new/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jun 2020 13:12:43 GMT -->
</html>