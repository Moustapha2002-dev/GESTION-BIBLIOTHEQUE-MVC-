<div class="conteneur">
    <div class="form">
        <form action="index.php" method="post">
            <div class="form-control">
                <label for="">Etat</label>
                <select name="etat" id="">
                    <option value="En cours">EN COURS</option>
                    <option value="En retard">EN RETARD</option>
                    <option value="Dans les delais">RENDU</option>
                </select>
            </div>
            <div class="form-control">
                <button type="submit" name="btnsave" value="recherche-etat">Recherche</button>
            </div>
        </form>
    </div>
<div class="conteneur">
    <div class="classe">
        <table>
            <tr>
                <th>ID</th>
                <th>NOM ET PRENOM</th>
                <th>D'ATE EMPRUNT</th>
                <th>D'ATE RENDU PREVU</th>
                <th>D'ATE RENDU REEL</th>
                <th>OUVRAGE EMPRUNTER</th>
                <th>NOMBRE D'OUVRAGE EMPRUNTER</th>
            </tr>
            <?php foreach ($prets as $value):?>
                <tr>
                    <td><?php echo($value['id']) ?></td> 
                    <td><?= $value['nomP'] ?></td> <!-- syntaxe abrégée de celui du haut-->
                    <td>
                        <?php echo ($value['datee']) ?>
                    </td>
                    <td><?= $value['daterp'] ?></td>
                    <td><?= $value['daterr'] ?></td>
                    <td><?= $value['titre'] ?></td>
                    <td><?= $value['nbre'] ?></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>