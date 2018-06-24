<div class="panel panel-default">
  <div class="panel-heading">
    <div class="panel-title">
			<div class="row">
				<div class="col-xs-12 col-sm-6">
		      App Reviews
				</div>
				<form class="col-sm-6 col-md-4 pull-right">
			    <div class="input-group">
			      <input type="text" name="q" class="form-control" placeholder="Search for..." value="<?= $search ?>">
			      <span class="input-group-btn">
			        <button class="btn btn-default" type="button">Go!</button>
			      </span>
			    </div><!-- /input-group -->
			  </form>
			</div>
    </div>
  </div>
	<div class="panel-body">
		<div class="table-responsive table-primary">
			<table class="table">
				<thead>
					<tr>
						<th>Domain</th>
						<th>Update Date</th>
						<th>Last Rating</th>
						<th>Actual Rating</th>
					</tr>
				</thead>
				<tbody>
					<?=
						join(
							'',
							array_map(
								function($app){
									return $this->Html->tag(
										'tr',
										[
											$this->Html->tag('td', $app->shopify_domain),
											$this->Html->tag('td', $app->updated_at),
											$this->Html->tag('td', $this->Stars->prettyCount($app->previous_star_rating ?? 0)),
											$this->Html->tag('td', $this->Stars->prettyCount($app->star_rating ?? 0))
										]
									);
								},
								$apps
							)
						)
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
