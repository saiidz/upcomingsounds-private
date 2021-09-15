<!-- Logout Modal -->
<div class="logout_modal" role="dialog"></div>
<div class="modal" role="alert">
    <div class="main-delete-box">
        <div class="delete-box logout">
            <a href="#"><img src="{{asset('images/logout_icon.svg')}}"  alt="" /></a>
            <h3>Come Back Soon!</h3>
            <p>Are you sure you want to logout?</p>
            <div class="delete-btn">
                <a class="btn delete-two" role="button" href="{{url('/logout')}}">Logout </a>
                <a class="btn delete-one closing" role="button" href="#">Cancel </a>
            </div>
        </div>
    </div>
    <!--  <button class="close" role="button">X</button>-->
</div>
