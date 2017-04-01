<?php /* Smarty version 2.6.26, created on 2010-08-06 07:28:03
         compiled from zh_tw/index.tpl.htm */ ?>
<div id="sky_back">
	<?php if ($this->_tpl_vars['month'] == 8): ?>
		<div id="calender_index">
			<div id="date_list_8">
				<div id="event_all">
					<a href="opt_check.php?id=15"><div title="啟動E-mail帳號及線上登入學籍資料" id="event1"></div></a>
					<a href="opt_check.php?id=15"><div title="啟動E-mail帳號及線上登入學籍資料" id="event1-1"></div></a>
					<a href="opt_check.php?id=16"><div title="申請學雜費減免" id="event2"></div></a>
					<a href="opt_check.php?id=16"><div title="申請學雜費減免" id="event2-2"></div></a>
					<a href="opt_check.php?id=17"><div title="查詢宿舍" id="event3"></div></a>
					<a href="opt_check.php?id=18"><div title="取消住宿" id="event4"></div></a>
					<a href="opt_check.php?id=19"><div title="繳交學雜費" id="event5"></div></a>
					<a href="opt_check.php?id=19"><div title="繳交學雜費" id="event5-2"></div></a>
				</div>
				<div id="calender_word">
				</div>
				<div id="month_8">
				</div>
				<div>
					<a href="index.php?mon=9"><div title="九月月曆" id="month_to_9"></div></a>
				</div>
			</div>
		</div>
	<?php elseif ($this->_tpl_vars['month'] == 9): ?>
		<div id="calender_index">
			<div id="date_list_9">
				<div id="event_all">
					<a href="opt_check.php?id=19"><div title="繳交學雜費" id="event5-3"></div></a>
					<a href="opt_check.php?id=19"><div title="繳交學雜費" id="event5-4"></div></a>
					<a href="opt_check.php?id=20"><div title="新生入住" id="event6"></div></a>
					<a href="opt_check.php?id=20"><div title="新生入住" id="event6-2"></div></a>
					<a href="opt_check.php?id=21"><div title="英文分級測驗" id="event7"></div></a>
					<a href="opt_check.php?id=22"><div title="中大新生營" id="event8"></div></a>
					<a href="opt_check.php?id=23"><div title="院系時間" id="event9"></div></a>
					<a href="opt_check.php?id=25"><div title="身心調適訓練" id="event10"></div></a>
					<a href="opt_check.php?id=27"><div title="僑生中文測驗" id="event11"></div></a>
					<a href="opt_check.php?id=26"><div title="課程加退選" id="event12"></div></a>
					<a href="opt_check.php?id=26"><div title="課程加退選" id="event12-2"></div></a>
					<a href="opt_check.php?id=26"><div title="課程加退選" id="event12-3"></div></a>
					<a href="opt_check.php?id=24"><div title="新生體檢" id="event13"></div></a>
					<a href="opt_check.php?id=29"><div title="註冊開學" id="event14"></div></a>
					<a href="opt_check.php?id=29"><div title="註冊開學" id="event14_2"></div></a>
					<a href="opt_check.php?id=28"><div title="大一國文寫作檢定" id="event16"></div></a>
					<a href="opt_check.php?id=30"><div title="繳交兵役資料" id="event17"></div></a>
					<a href="opt_check.php?id=31"><div title="受理選課資料更正" id="event18"></div></a>
					<a href="opt_check.php?id=31"><div title="受理選課資料更正" id="event18-2"></div></a>
				</div>
				<div id="calender_word">
				</div>
				<div id="month_9">
				</div>
				<div>
					<a href="index.php?mon=8"><div title="八月月曆" id="month_to_8"></div></a>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<!--EVENT-->
	<?php echo $this->_tpl_vars['events']; ?>

	<!--EVENT-->
	<div id="add">
		<?php if ($this->_tpl_vars['currmodule']->is_admin($this->_tpl_vars['curruser']->uid)): ?>
			<form action="addform.php" method="post">
			<input name="" type="submit" value="新增文件"/>
			</form>
		<?php endif; ?>
	</div>
</div>