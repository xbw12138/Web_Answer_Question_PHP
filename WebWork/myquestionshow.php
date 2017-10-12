<?php
/**
 * Created by PhpStorm.
 * User: xubowen
 * Date: 2017/6/6
 * Time: 上午12:34
 */
require_once 'header.php';
require_once 'api/_myquestion.php';
?>
<div class="container" style="margin-bottom: 35px;">
    <div class="section">
        <?php
        $array[]=array();
        if(isset($_GET['type'])){
            if($_GET['type']=="danxuan"){
                $array=selectDanxuanProblem();
            }else if($_GET['type']=="duoxuan"){
                $array=selectDuoxuanProblem();
            }else if($_GET['type']=="panduan"){
                $array=selectPanduanProblem();
            }
        }else{
            echo  "意图不明确";
        }
        ?>
        <?php
        if(isset($_GET['type'])){
            if($_GET['type']=="danxuan"){
                echo '<h1 class="header center orange-text">单选题</h1>';
            }else if($_GET['type']=="duoxuan"){
                echo '<h1 class="header center orange-text">多选题</h1>';
            }else if($_GET['type']=="panduan"){
                echo '<h1 class="header center orange-text">判断题</h1>';
            }
        }
        ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>问题</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i=1;
                foreach($array as $data){?>
                    <tr>
                        <td><?php echo $i++.'.'.$data['pro'];?></td>
                        <td>
                            <a class="btn btn-danger btn-sm" href="<?php echo "api/_deleteque.php?id=".$data['id']."&type=".$_GET['type'];?>" onclick="JavaScript:return confirm('确定删除吗？')">删除</a>
                            <a class="btn btn-info btn-sm" href="<?php echo "modifyque.php?id=".$data['id']."&type=".$_GET['type'];?>">修改</a>
                        </td>
                    </tr>
                <?php } ?>

                </tbody>
            </table>
        </div>

    </div>
</div>


<?php
require_once 'footer.php';
?>
