<?php
$total_final = 0.0;
if ($vendas) { ?>
    <h1 class="text-center" style="margin-top: 50px;">Relatorio de Vendas</h1>

    <h1 class="container" style="margin-top: 50px;">Vendas</h1>
    <div class="table-responsive container" style="margin-top: 10px;">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th scope="col">Codigo da Venda</th>
                    <th scope="col">Quantidade Comprada</th>
                    <th scope="col">Valor total</th>
                </tr>
            </thead>

            <tbody style="overflow:auto;  height: 100px;">

                <?php foreach ($vendaTotalPorID as $indice => $value) { ?>

                    <tr>
                        <th scope="row"><?php echo $vendaTotalPorID[$indice]['id_da_venda']; ?></th>
                        <td><?php echo $vendaTotalPorID[$indice]['qtd_comprada']; ?></td>
                        <td class="money"><?php echo $vendaTotalPorID[$indice]['sum(valor_total)']; ?></td>
                        <?php $total_final += $vendaTotalPorID[$indice]['sum(valor_total)']; ?>
                    </tr>

                <?php } ?>

            </tbody>

        </table>
    </div>

    <h3 class="container" style="margin-top: 10px;">Valor total de compras : <?php echo "R$ " . number_format($total_final, 2, '.', ','); ?></h3>
    <h3 class="container" style="margin-top: 10px;">Valor total de venda : <?php echo number_format($vendaTotID, 2, '.', ','); ?></h3>

    <h1 class="container" style="margin-top: 70px;">Top dez venda mês</h1>

    <div class="table-responsive container" style="margin-top: 10px;">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th scope="col">Nome do produto</th>
                    <th scope="col">Mês</th>
                    <th scope="col">Total comprado</th>
                </tr>
            </thead>

            <tbody style="overflow:auto;  height: 100px;">

                <?php foreach ($vendaTopDezMes as $indice => $value) { ?>

                    <tr>
                        <td><?php echo $vendaTopDezMes[$indice]['nome_produto']; ?></td>
                        <td><?php echo $vendaTopDezMes[$indice]['mes_venda']; ?></td>
                        <td class="money"><?php echo $vendaTopDezMes[$indice]['total']; ?></td>
                    </tr>

                <?php } ?>

            </tbody>

        </table>
    </div>

    <h1 class="container" style="margin-top: 70px;">Top dez venda Dia</h1>

    <div class="table-responsive container" style="margin-top: 10px;">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th scope="col">Nome do produto</th>
                    <th scope="col">Dia</th>
                    <th scope="col">Total comprado</th>
                </tr>
            </thead>

            <tbody style="overflow:auto;  height: 100px;">

                <?php foreach ($vendaTopDezDia as $indice => $value) { ?>

                    <tr>
                        <td><?php echo $vendaTopDezDia[$indice]['nome_produto']; ?></td>
                        <td><?php echo $vendaTopDezDia[$indice]['dia_venda']; ?></td>
                        <td class="money"><?php echo $vendaTopDezDia[$indice]['total']; ?></td>
                    </tr>

                <?php } ?>

            </tbody>

        </table>
    </div>





    <h1 class="container" style="margin-top: 70px;">Top venda Dia</h1>

    <div class="table-responsive container" style="margin-top: 10px;">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th scope="col">Nome do produto</th>
                    <th scope="col">Dia</th>
                    <th scope="col">Total comprado</th>
                </tr>
            </thead>

            <tbody style="overflow:auto;  height: 100px;">

                <?php foreach ($vendaDia as $indice => $value) { ?>

                    <tr>
                        <td><?php echo $vendaDia[$indice]['nome_produto']; ?></td>
                        <td><?php echo $vendaDia[$indice]['dia_venda']; ?></td>
                        <td class="money"><?php echo $vendaDia[$indice]['total']; ?></td>
                    </tr>

                <?php } ?>

            </tbody>

        </table>
    </div>


    <h1 class="container" style="margin-top: 70px;">Top venda Mês</h1>

    <div class="table-responsive container" style="margin-top: 10px;">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th scope="col">Nome do produto</th>
                    <th scope="col">Mês</th>
                    <th scope="col">Total comprado</th>
                </tr>
            </thead>

            <tbody style="overflow:auto;  height: 100px;">

                <?php foreach ($vendaMes as $indice => $value) { ?>

                    <tr>
                        <td><?php echo $vendaMes[$indice]['nome_produto']; ?></td>
                        <td><?php echo $vendaMes[$indice]['mes_venda']; ?></td>
                        <td class="money"><?php echo $vendaMes[$indice]['total']; ?></td>
                    </tr>

                <?php } ?>

            </tbody>

        </table>
    </div>

<?php } else { ?>

    <h1 class="text-center"  style="margin-top: 300px; margin-bottom: 400px;">Ainda não tem vendas rode o script</h1>

<?php } ?>