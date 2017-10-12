<?php
/**
 * Created by PhpStorm.
 * User: xubowen
 * Date: 2017/6/4
 * Time: 下午1:44
 */
require_once 'header.php';
require_once 'api/_standing.php';
?>
    <div class="container" style="margin-bottom: 35px;">
        <div class="section">
            <!--   Icon Section   -->
            <div class="row">
                <div class="row marketing">
                    <h2 class="sub-header">排名</h2>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>姓名</th>
                                <th>解决题数</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $array=getStanding();
                            foreach($array as $data){
                                ?>
                                <tr>
                                    <td><?php echo $data[0];?></td>
                                    <td><?php echo $data[1];?></td>
                                    <td><?php echo $data[2];?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>

<?php
require_once 'footer.php';
?>