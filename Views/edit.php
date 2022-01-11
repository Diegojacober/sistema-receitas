<?php
session_start();
date_default_timezone_set('america/sao_paulo');
?>

<div class="card-edit">
<form  method="POST" action="../Controllers/ReceitaController.php?edit=<?= $_GET['id'];?>">
                    <div class="card-head-edit">
                        <h4><input type="text" name="nome" value="<?= $_GET['nome'] ?>">, <input type="text" name="idade" value="<?= $_GET['idade'] ?>"> anos</h4>
                        <small><?php echo date('d/m/Y H:i:s'); ?></small>

                    </div>

                    <div class="card-body-edit">
                    
                        <div class="table-responsive tabela">
                            

                            <table class="table table-bordered">

                                <thead class="thead-dark">

                                    <tr>

                                        <th>OLHO</th>

                                        <th>ESFÉRICO</th>

                                        <th>CILINDRICO</th>

                                        <th>EIXO</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <tr>

                                        <td style="color: red;">OD</td>

                                        <td> <input type="text" name="od_esferico" value="<?= $_GET['od_esferico'] ?>"> </td>

                                        <td> <input type="text" name="od_cilindrico" value="<?= $_GET['od_cilindrico'] ?>"> </td>

                                        <td> <input type="text" name="od_eixo" value="<?= $_GET['od_eixo'] ?>"> </td>

                                    </tr>



                                    <tr>

                                        <td style="color: red;">OE</td>

                                        <td><input type="text" name="oe_esferico" value="<?= $_GET['oe_esferico'] ?>"> </td>

                                        <td><input type="text"  name="oe_cilindrico" value="<?= $_GET['oe_cilindrico'] ?>"> </td>

                                        <td> <input type="text"  name="oe_eixo" value="<?= $_GET['oe_eixo'] ?>"> </td>

                                    </tr>

                                </tbody>



                            </table>

                        </div>

                        <div >Adição: <input  name="adicao" class=" form-control" type="text" value="<?= $_GET['adicao'] ?>"> 
                        </div>
                        <br><br><br>
                        <div>Descrição: <input  name="descricao" class=" form-control" type="text" value="<?= $_GET['descricao'] ?>"></div>
                        <br><br><br>
                        <button type="submit" class="btn btn-block btn-outline-dark">Atualizar</button>
                        </form>
                    </div>