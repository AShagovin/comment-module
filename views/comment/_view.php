<?php
	Yii::app()->clientScript->registerCss('ext-comment', "
	div.ext-comment {
		width: 100%;
		margin: 25px auto;
		min-height: 100px;
	}
	div.ext-comment p {
		padding-left: 125px;
	}
	div.ext-comment hr {
		margin: 0;
		padding: 0;
		border: none;
		border-bottom: solid 1px #aaa;
	}
	div.ext-comment img {
		float: left;
		width: 80px;
		height: 80px;
	}
	span.ext-comment-name {
		font-weight: bold;
	}
	span.ext-comment-head {
		color: #aaa;
	}
	");
?>
<div class="ext-comment">
	<span class="ext-comment-head">
		<span class="ext-comment-name"><?php echo $data->userName; ?></span>
		wrote on
		<span class="ext-comment-date">
			<?php echo Yii::app()->format->formatDateTime(
				is_numeric($data->createDate) ? $data->createDate : strtotime($data->createDate)
			); ?>
		</span>:
	</span>
	<hr />
	<?php $this->widget('comment.extensions.gravatar.yii-gravatar.YiiGravatar', array(
	    'email'=>$data->userEmail,
	    'size'=>80,
	    'defaultImage'=>'monsterid',
	    'secure'=>false,
	    'rating'=>'r',
	    'emailHashed'=>false,
	    'htmlOptions'=>array(
	        'alt'=>$data->userName,
	        'title'=>$data->userName
	    )
	)); ?>
	<p><?php echo nl2br(CHtml::encode($data->message)); ?></p>
	<br style="clear: both;"/>
</div>
