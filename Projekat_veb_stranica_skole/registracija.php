<form action="registracija2.php" method="POST">
    <input type="text" name="ime" required="required" placeholder="Ime">
    <input type="text" name="prezime" required="required" placeholder="Prezime">
    <input type="text" name="user_name" required="required" placeholder="Korisnicko ime">
    <input type="email" name="email" required="required" placeholder="Email">
    <input type="password" name="password" required="required" placeholder="Lozinka">
    <select name="zanimanje" required="required">
        <option value="1">Administrator</option>
        <option value="2">Saradnik</option>
    </select>
    <input type="submit" value="Registrujte se">
</form>