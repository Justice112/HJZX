<div data-role="page" id="wrap" class="login">
    <header>
        <script src="/js/common.js"></script>
        <h1><a href="javascript:;" class="logo">沪江在线</a></h1>
        <a href="javascript:;" class="list">我的沪江<i></i></a>
        <a href="/Users/logout" class="key"></a>
    </header>
    <div id="content" class="course_list">
        <h2>学生课表</h2>
        <div style="width:100%; overflow-x:scroll">
            <table id="Table1" class="blacktab" bordercolor="Black" border="0" width="200%">
                <tbody>
                    <tr>
                        <td align="Center" width="14%">星期一</td>
                        <td align="Center" width="14%">星期二</td>
                        <td align="Center" width="14%">星期三</td>
                        <td align="Center" width="14%">星期四</td>
                        <td align="Center" width="14%">星期五</td>
                        <td align="Center" width="14%">星期六</td>
                        <td align="Center" width="14%">星期日</td>
                    </tr>
                    <?php
                        $count1 = 0;
                        $count2 = 0;
                        $count3 = 0;
                        $color = 1;
                        for ( $y = 1 ; $y < 13 ; $y++ ){
                    ?>
                    <tr>
                    <?php for ( $x = 1 ; $x < 8 - $count1 ; $x++ ) { ?>
                        <?php
                            $a=null;
                            $num = 1;
                            foreach($courseinfos as $courseinfo){
                                if($courseinfo['CourseInfo']['day'] == $x && $courseinfo['CourseInfo']['begin_section'] == $y){
                                    $a[] = $courseinfo;
                                    $num = $courseinfo['CourseInfo']['section_num'];
                                    $count2 ++;
                                    if($num == 3){
                                        $count3++;
                                    }
                                }
                            }
                        ?>
                        <td align="Center" rowspan="<?php echo $num; ?>" <?php if(isset($a)){ ?> class="tbg<?php echo $color%5+1; ?>"<?php } ?>>
                            <?php
                                if(!isset($a)){
                                    echo '&nbsp;';
                                }
                                else{
                                    $color++;
                                    foreach($a as $one){
                            ?>
                            <a href="/Mobile/Posts/postlist/<?php echo $one['Course']['id']; ?>">
                                <?php echo $one['Course']['name']; ?><br>
                                <?php echo $one['Course']['teacher_name']; ?><br>
                                <?php echo $one['CourseInfo']['room']; ?>
                            </a>
                            <?php
                                    }
                                }
                            ?>
                        </td>
                        <?php } ?>
                    </tr>
                    <?php
                        $count1 = $count2 ;
                        $count2 = $count3 ;
                        $count3 = 0;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $(".popReg p").css('margin-top',$(window).height()/2-100);
        });
    </script>
</div>
