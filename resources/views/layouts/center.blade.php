<div class="posts-section">
    @php
        $publ = DB::table('publications')
        ->join('authentifications', 'publications.id_user', '=','authentifications.id_user')
        ->select('publications.*', 'authentifications.*')->get();

        $like = DB::table('publications')->where('like',1)->get();
        //$cmd = DB::table('commentaires')
        //->join('authentifications', 'commentaires.id_user', '=','authentifications.id_user')
        //->join('publications', 'publications.id_user', '=','commentaires.id_user')->get();

        
    @endphp
    @foreach($publ as $pub)
    @php
        $count = DB::table('commentaires')
        ->join('publications', 'publications.id_pub', '=','commentaires.id_pub')
        ->where('commentaires.id_pub',$pub->id_pub)
        ->select('commentaires.*','publications.*')->get();
    @endphp
    <div class="post-bar">
        <div class="post_topbar">
            <div class="usy-dt">
                <img src="{{ asset('upload/user_images/'.$pub->photo) }}" alt="">
                <div class="usy-name">
                    <h3>{{$pub->prenom. ' '.$pub->nom }}</h3>
                    <span><img src="assets/images/clock.png" alt="">3 min ago</span>
                </div>
            </div>
            <div class="ed-opts">
                <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                <ul class="ed-options">
                    <li><a href="#" title="">Edit Post</a></li>
                    <li><a href="#" title="">Unsaved</a></li>
                </ul>
            </div>
        </div>
        <div class="job_descp">
            <ul class="job-dt">
                <li></li>
                <li><span></span></li>
            </ul>
            <p>{{ $pub->contenu }}</p>
        </div>
        <div class="job-status-bar">
            <ul class="like-com">
                @if($pub->like != 0)
                <li style="margin-bottom: 10px">
                    <a href="{{ url('/like-inactive/'.$pub->id_pub) }}" class="active" >
                        <i class="fas fa-heart"></i> Like {{ $like->count() }}</a>
                </li> 
                @else
                <li style="margin-bottom: 10px">
                    <a href="{{ url('/like-active/'.$pub->id_pub) }}"><i class="fas fa-heart"></i> Like</a>
                </li> 
                @endif
                <li>
                    <a href="{{ url('/show-commente/'.$pub->id_pub) }}" class="com">
                    @if ($count->count() !=null)
                        <i class="fas fa-comment-alt"> </i>   Commentaire {{$count->count()}}
                    @else
                        <i class="fas fa-comment-alt"> </i> Commentaire
                    @endif
                    </a>
                </li>
            </ul>
            <a href="#"><i class="fas fa-eye"></i>Views 50</a>
        </div>
        @foreach($count as $co)
        <div class="main-message-box st3">
            <div class="message-dt st3">
                <div class="message-inner-dt">
                    <p>{{ $co->commente }}<img src="images/smley.png" alt=""></p>
                </div><!--message-inner-dt end-->
                <span>5 minutes ago</span>
            </div><!--message-dt end-->
            <div class="messg-usr-img">
                <img src="assets/images/resources/bg-img4.png" alt="">
            </div><!--messg-usr-img end-->
        </div><!--main-message-box end-->
        @endforeach
        <div class="post-comment">
                <div class="cm_img">
                    <img src="assets/images/resources/bg-img4.png" alt="">
                </div>
                <br>
                <div class="comment_box">
                    <form action="{{ url('/save-commente/'.$pub->id_pub) }}" method="post">
                        @csrf
                        <input type="text" name="commente" placeholder="Publier un commentaire">
                        <button type="submit">Send</button>
                    </form>
                </div>
            </div>
    </div><!--post-bar end-->
    @endforeach
</div><!--posts-section end-->