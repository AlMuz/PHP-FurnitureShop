<?php $this->assign('title', $product->Name.' - '.$maintitle);?>
<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb" style="margin-bottom: 10px">
			<li>
				<?= $this->Html->link('Home','/');?>
			</li>
			<li>
				<a href='/category/view/<?=$product->Category_idCategory ?>'><?=$product->category->Title ?></a>
			</li>
			<li class="active">
				<?= $product->Name;?>
			</li>
		</ol>
	</div>
</div>

<div class="col-md-12" style="margin-bottom: 20px">
	<div class="col-sm-6 col-md-6 pull-right">
		<?= $this->Html->image($product->MainImage,['class'=>'img-responsive img', 'style' => 'max-height: 500px; ' ]);?>
	</div>
	<div class="col-sm-6 col-md-6 ">
		<h1 class="page-header">
			<b><?= $product->Name;?></b>
		</h1>
		<h2 style="padding: 0 5px 10px 10px; margin: 0;">Price:
			<?= $this->Number->currency($product->Price, $currency);?>
		</h2>
		<?php if($loggedIn) : ?>
			<div class="form-group">
				<?= $this->Form->create('Cart',array('id'=>'addtocart','url'=>array('controller'=>'product','action'=>'add')));?>
				<?= $this->Form->hidden('product_id',array('value'=>$product->idProduct))?>
				<?= $this->Form->input('quantity', ['class' => 'form-control input-small','id' => 'Quantity', 'placeholder' => 'Quantity', 'style' => 'margin-left:10px; width: auto', 'label' => false, 'maxlength' => 2,'value'=> '1' ]); ?>
				<?= $this->Form->submit('Add to cart',array('class'=>'btn-success btn', 'style' => 'margin-left:10px; margin-top: 10px;'));?>
				<?= $this->Form->end();?>
			</div>
		<?php else :   ?>
			<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#buy" style="margin-left:10px">Add to cart</button>
			<div id="buy" class="collapse out">
				<p style="font-size:16px; margin-left:20px;"><br>If you want to add product in cart, <br>please login</p>
				<?= $this->Html->link(
			    'Sign in!',
			    '/user/login',
			    ['class' => 'btn btn-info', 'style' => 'margin-left:30px']
					);
				?>
			</div>
		<?php endif; ?>

		<div style=" padding-top: 20px;">
			<ul class="nav nav-tabs">
		    <li class="active"><a data-toggle="tab" href="#home">Information</a></li>
		    <li><a data-toggle="tab" href="#menu1">Gallery</a></li>
		  </ul>

		  <div class="tab-content">
		    <div id="home" class="tab-pane fade in active">
					<h2>Description</h2>
					<?= $product->Description;?>

					<h2>Size</h2>
					<?= $product->Size;?>

					<h2>Material</h2>
					<?= $product->material->Title;?>

					<h2>Weight</h2>
					<?= $product->Weight.' Kilogram';?>
		    </div>

		    <div id="menu1" class="tab-pane fade">
					<h3>Gallery</h3>
					<div style="display:inline;">
						<?php if(!empty($product->image)): ?>
							<?php foreach ($product->image as $image):?>
								<?=$this->Html->image($image->Image,array('escape'=>false,'class'=>'img-responsive smallimg','style'=>'max-height:140px;display: inline; padding-bottom: 5px'));?>
							<?php endforeach;?>
						<?php else: ?>
							<?= 'There are no photo in gallery:(' ?>
						<?php endif; ?>
					</div>
		    </div>

		  </div>
		</div>
	</div>
</div>
<div class="c"></div>
<div class="col-md-12" style="margin-bottom: 20px">
</div>

<script src="/js/validation.js"></script>
