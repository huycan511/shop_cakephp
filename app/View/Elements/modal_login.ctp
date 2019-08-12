<div id="modal-custom" data-iziModal-group="grupo1">
        <button data-iziModal-close class="icon-close">x</button>
        <header>
            <a href="" id="signin" class="active">Sign in</a>
            <a href="">New Account</a>
        </header>
        <section>
            <input type="mail" placeholder="Email" id="email_login">
            <input type="password" placeholder="Password" id="pass_login">
            <footer>
                <button data-iziModal-close>Cancel</button>
                <button id="login_user_btn">Log in</button>
            </footer>
            <h5 class="text-center" style="margin-top: 10px;color: #777;">or</h5>
            <div class="text-center">
				<a href="#" class="btn btn-block btn-social btn-facebook btn-auth" style="float:left; margin-left:167px;margin-right: 10px;">
				<span class="fab fa-facebook-square"></span> Sign in
				</a>
				<div class="g-signin2" data-onsuccess="onSignIn" >dsds</div>

            </div>

        </section>
        <section class="hide">
            <input type="text" placeholder="Username" id="username_register">
            <input type="text" placeholder="Email" id="email_register">
            <input type="password" placeholder="Password" id="password_register">
            <footer>
                <button data-iziModal-close>Cancel</button>
                <button class="submit" data-iziModal-close id="register_btn">Create Account</button>
            </footer>
        </section>
    </div>
