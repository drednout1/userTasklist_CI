
    <div id="task">
        <form action="/tasks/save">
            New Task <input id='text' type="text" name="text" value="<?= $text ?>"><br><br>
            <button id="submit" type="submit">Confirm</button>
        </form><br>
    </div>
    <a href="/auth/logout" name='logout'>Logout</a><br><br>