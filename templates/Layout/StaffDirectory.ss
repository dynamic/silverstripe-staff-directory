<div class="container main">
    <div class="row">
        <aside class="col-lg-4 col-lg-push-8" role="complementary">
			<% include SideBar %>
        </aside>
        <div class="col-lg-8 col-lg-pull-4 content" role="main">
            <h1>$Title</h1>
			$Content
				<% if $PaginatedList %>
					<section>
						<div class="row">
							<% loop $PaginatedList %>
								<div class="staffMembers col-md-4">
									<% if $Image %>
										<a href="{$Link}" title="{$Title}" class="anchor-fix">
											<% with $Image %>
												<% loop $Fill(300, 400) %>
													<img src="{$URL}" class="staffmember-image img-responsive"/>
												<% end_loop %>
											<% end_with %>
										</a>
									<% end_if %>
									<div class="inner">
										<h3><a href="{$Link}" title="{$Title}">{$Title.LimitCharacters(48)}</a></h3>
										<p class="double-bottom"><strong>$Position</strong></p>
										<p class="half-bottom"><a href="$Link" alt="Learn More">Learn more</a></p>
									</div>
								</div>
							<% end_loop %>
						</div>
						<% with $PaginatedList %>
							<% include Pagination %>
						<% end_with %>
					</section>
				<% end_if %>

			$Form
			$PageComments
        </div>
    </div>
</div>