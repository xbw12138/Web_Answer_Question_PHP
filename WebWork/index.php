<?php
/**
 * Created by PhpStorm.
 * User: xubowen
 * Date: 2017/6/4
 * Time: 下午1:44
 */
include_once 'header.php';
?>
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <br><br>
        <h1 class="header center orange-text"><?php echo $_SESSION['title'];?></h1>
        <div class="row center">
            <h5 class="header col s12 light">
                <?php if(isset($_SESSION['types'])&&$_SESSION['types']=="N"){//学生
                    echo '<a href="problemshow.php?type=random">查看随机试题100道</a><br>';
                }?>
            </h5>
        </div>
        <br><br>
    </div>
</div>


<div class="container" style="margin-bottom: 35px;">
    <div class="section">

        <!--   Icon Section   -->
        <div class="row">
            <div class="col s12 m4">
                <div class="icon-block">
                    <h5 class="center">单选题</h5>
                    <p class="center">
                        <?php if(isset($_SESSION['types'])&&$_SESSION['types']=="N"){//学生
                            echo '<a href="problemshow.php?type=danxuan">查看全部单选题</a><br>';
                        }else{//老师
                            echo '<a href="setquestion.php?type=danxuan">编辑单选题</a><br>';
                        }?>
                    </p>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="icon-block">
                    <h5 class="center">多选题</h5>
                    <p class="center">
                        <?php if(isset($_SESSION['types'])&&$_SESSION['types']=="N"){//学生
                            echo '<a href="problemshow.php?type=duoxuan">查看全部多选题</a><br>';
                        }else{//老师
                            echo '<a href="setquestion.php?type=duoxuan">编辑多选题</a><br>';
                        }?>
                    </p>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="icon-block">
                    <h5 class="center">判断题</h5>
                    <p class="center">
                        <?php if(isset($_SESSION['types'])&&$_SESSION['types']=="N"){//学生
                            echo '<a href="problemshow.php?type=panduan">查看全部判断题</a><br>';
                        }else{//老师
                            echo '<a href="setquestion.php?type=panduan">编辑判断题</a><br>';
                        }?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="section">

    </div>
</div>
<?php include_once 'footer.php';?>


