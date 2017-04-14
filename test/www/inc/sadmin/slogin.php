<?php
print '<form action="sadmin.php" method="post" onSubmit="encode()">
            <table><tbody>
            <tr>
            <td>Login:</td>
            <td><input type="text" name="user_name" /></td>
            </tr>
            <tr>
            <td>Password:</td>
            <td><input type="password" name="pass" /><td>
            </tr>
            <tr>
            <td rowspan="2"><input type="hidden" name="md" /></td>
            </tr>
            <tr>
            <td rowspan="2"><input type="submit" value="Submit" /></td>
            </tr>
            </tbody></table>
          </form>';
?>