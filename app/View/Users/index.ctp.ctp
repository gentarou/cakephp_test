<?PHP
	echo $this->Html->meta('icon');
    
?>
<div id="wrapper">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<div id="contentsArea">
		<h2 class="title01">ユーザー一覧</h2>
		<div class="contentsBox">
			<div class="courseArea">
                <p class="titleP mb1em"></p>
                    <div class="Reg_tRightBtn_01 tRight clear">
                        <?php
                            $options = array(
                                '' => '▼部署を選択してください',
                                '1' => 'ICTソリューション',
                                '2' => 'WEBマーケティング',
                                '3' => 'デザイン・WEB',
                                '4' => 'クラウドサービス',
                                '5' => '総務',
                            );
                            $select = array(
                                'type' => 'select',
                                'selected' => !empty($groupId) ? $groupId : null,
                                'options' => $options,
                                'id' => 'data[group_id]',
                                'name' => 'group_id',
                            );
                            echo $this->Form->create(false,array(
                                'method' => 'POST',
                                'action' => '',
                            ));
                            echo $this->Form->input('配属部署',$select);
                            echo $this->Form->submit('検索',array(
                                'type'  => 'submit',
                                'class' => 'button_red_su',
                                'style' => 'position: relative; left: 380px;',
                            ));
                            echo $this->Form->end();
                        ?>
                        <a href="/Users/index">
                            <td><button type="button"  class="button_red_su">全ユーザ表示</button></td>
                        </a>
                        <a href="/Users/add">
                            <button value="to add users" type="button" class="button_add">ユーザー新規登録</button>
                        </a>
                    </div>
					<div class="courseGrid">
						<div class="cb">
                        <table summary="店舗一覧" id="user_list" class="tablesorter">
                            <thead>
                                <tr>
	        			            <th class='tablesorter-header'>ユーザー番号</th>
	        			            <th class='tablesorter-header'>ユーザー名</th>
	        			            <th class='tablesorter-header'>ログインID</th>
	        			            <th class='tablesorter-header'>編集</th>
                                </tr>
                            </thead>
                            <tbody>
                    <?php 
                            if (!empty($groupOnly)) {
						        $i = 1;
						        foreach ($groupOnly as $cbNo => $data) {
					?>
                                <tr>
                                  <td><?php echo $i; ?></td>
                                  <td><?php echo $data['User']['name']; ?></td>
                                  <td><?php echo $data['User']['login_id']; ?></td>
							      <?php	

                                   if (isset($groupOnly) && isset($master)) {
                                        if ($master == true) {
                                            echo '<td><button type="button" class="button_red_su" value="edit" onclick="location.href=\'/Users/modified/'.$data['User']['user_id'].'\'">編集</button></td>';
                                        } elseif ($data['User']['user_id'] == $userId) {
                                            echo '<td><button type="button" class="button_red_su" value="edit" onclick="location.href=\'/Users/modified/'.$data['User']['user_id'].'\'">編集</button></td>';
                                        } else {
                                            echo '<td></td>';
                                        }
                                   }
							    ?>
                                </tr>
					<?php           $i++; 
                                } 
                            } elseif (isset($userTable)) {
						        $i = 1;
						        foreach ($userTable as $cbNo => $data) {
                    ?>
                                <tr>
                                  <td><?php echo $i; ?></td>
                                  <td><?php echo $data['User']['name']; ?></td>
                                  <td><?php echo $data['User']['login_id']; ?></td>
							      <?php	
                              
                                   if (isset($userTable) && isset($master)) {
                                        if ($master == true) {
                                            echo '<td><button type="button" class="button_red_su" value="edit" onclick="location.href=\'/Users/modified/'.$data['User']['user_id'].'\'">編集</button></td>';
                                        } elseif ($data['User']['user_id'] == $userId) {
                                            echo '<td><button type="button" class="button_red_su" value="edit" onclick="location.href=\'/Users/modified/'.$data['User']['user_id'].'\'">編集</button></td>';
                                        } else {
                                            echo '<td></td>';
                                        }
                                   }
							    ?>
                                </tr>
					<?php           $i++; 
                                }
                            }
                    ?>
                            </tbody>
                        </table>
                    </div>
				</div> <!-- /courseSArea -->
			</div> <!-- /contentsBox -->
		</div>
	</div>
</div>
