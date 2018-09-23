<script type="text/javascript">
    AOS.init({
      offset: 200,
      duration: 1000,
      delay: 50,
    });
</script>

<div class="my-3 my-md-5">
    <div class="container">
        <div class="page-header col-12">
            <h4 class="page-title">Relatório por Unidade</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo URL; ?>realize">Realize</a></li>
                <li class="breadcrumb-item active" aria-current="page">Relatório por unidade</li>
            </ol>
        </div>
        <div class="col-3">
            <div class="form-group">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="filtro" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php if ($param == 0 OR $param == NULL){ echo "Todos"; } ?>
                    <?php if ($param == 288){ echo "Consignado Público"; } ?>
                    <?php if ($param == 123){ echo "Crédito Empresa MPE"; } ?>
                    <?php if ($param == 193){ echo "SBPE PF Negócios"; } ?>
                    <?php if ($param == 212){ echo "Poupança Negócios"; } ?>
                    <?php if ($param == 213){ echo "Depósitos Judiciais Negócios"; } ?>
                    <?php if ($param == 414){ echo "Cartões Ativação Negócios"; } ?>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="filtro">
                        <?php if ($param != 0 OR $param != NULL){ echo "<a class='dropdown-item' href='/geare/realize/relatorioUnidade'>Todos</a>"; } ?>
                        <?php if ($param != 288){ echo "<a class='dropdown-item' href='/geare/realize/relatorioUnidade/288'>Consignado Público</a>"; } ?>
                        <?php if ($param != 123){ echo "<a class='dropdown-item' href='/geare/realize/relatorioUnidade/123'>Crédito Empresa MPE</a>"; } ?>
                        <?php if ($param != 193){ echo "<a class='dropdown-item' href='/geare/realize/relatorioUnidade/193'>SBPE PF Negócios</a>"; } ?>
                        <?php if ($param != 212){ echo "<a class='dropdown-item' href='/geare/realize/relatorioUnidade/212'>Poupança Negócios</a>"; } ?>
                        <?php if ($param != 213){ echo "<a class='dropdown-item' href='/geare/realize/relatorioUnidade/213'>Depósitos Judiciais Negócios</a>"; } ?>
                        <?php if ($param != 414){ echo "<a class='dropdown-item' href='/geare/realize/relatorioUnidade/414'>Cartões Ativação Negócios</a>"; } ?>
                     </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="relatorio">
                <thead>
                  <tr>
                    <th>Unidade</th>
                    <th>Meta</th>
                    <th>Realizado Acumulado</th>
                    <th>% Atingido</th>
                    <th>GAP</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($baseRealize as $resultado) { ?>
                <tr>
                    <?php
                    if (isset($resultado["nObjetivoAcumulado"]) AND isset($resultado["nRealizadoAcumulado"]))
                    {
                        $gap = $resultado["nObjetivoAcumulado"]-$resultado["nRealizadoAcumulado"];
                    }
                    if ($gap < 0) {
                        $gap=0;
                    }
                    ?>
                    <td><?php if (isset($resultado["Nome_SR"])) echo $resultado["Nome_SR"]; ?></td>
                    <td><?php if (isset($resultado["nObjetivoAcumulado"])) echo ("R$ ".number_format($resultado["nObjetivoAcumulado"],2,",",".")); ?></td>
                    <td><?php if (isset($resultado["nRealizadoAcumulado"])) echo ("R$ ".number_format($resultado["nRealizadoAcumulado"],2,",",".")); ?></td>
                    <td><?php if (isset($resultado["fPercAtingido"])) echo number_format($resultado["fPercAtingido"]*100,2,",","."); ?></td>
                    <td><?php if (isset($gap)) echo ("R$ ".number_format($gap,2,",",".")); ?></td>
                </tr>
                <?php } ?>          
                </tbody>
            </table>
        </div>
        <div class="col-12" id="debug">
        </div>
    </div>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="<?php echo URL; ?>public/js/dataTables.bootstrap4.js"></script>

    <script>

        $(document).ready(function(){
            $("#relatorio").DataTable({
                "language": {
                    "lengthMenu": "Mostrar _MENU_ por página",
                    "infoFiltered": "filtrado de _MAX_ entradas",
                    "info": "Mostrando _START_ à _END_ de _TOTAL_ entradas",
                    "infoEmpty": "Nenhum resultado para mostrar",
                    "processing": "Processando...",
                    "search": "Procurar:",
                    "searchPlaceholder": "Filtros",
                    "emptyTable": "Nenhum resultado para mostrar",
                    "zeroRecords": "Nenhum resultado para mostrar",
                    "paginate":{
                        "first": "Primeira",
                        "next": "Próxima",
                        "last": "Última",
                        "previous": "Anterior"
                    }
                }
            });            
        });

    </script>
