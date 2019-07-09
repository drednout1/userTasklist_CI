<div id="block">
        <form action="login">
            <p>Authorization</p>
            Log <input type="text" name="login" value="<?= $login ?>"><br><br>
            Pass <input type="text" name="pass" value="<?= $pass ?>"><br><br>
            <button type="submit" name = "confirm">Confirm</button>
        </form>
        <a href="logout" name='logout'>Logout</a><br><br>
    </div>
    <div id="block">
        <p>Registration</p>
        <form action="reg">
            Log <input type="text" name="regLog" value="<?= $regLog ?>"><br><br>
            Pass <input type="text" name="regPass" value="<?= $regPass ?>"><br><br>
            Email <input type="text" name="email" value="<?= $email ?>"><br><br>
            <button type="submit">Confirm</button>
        </form>
    </div>

    