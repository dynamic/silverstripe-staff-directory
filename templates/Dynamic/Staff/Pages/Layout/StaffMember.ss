<div class="container main">
    <div class="row">
        <aside class="col-lg-4 col-lg-push-8" role="complementary">
			<% include SideBar %>
        </aside>
        <div class="col-lg-8 col-lg-pull-4 content" role="main">
			<h1>$Parent.Title</h1>
			<div class="row">
                <div class="col-md-5">
					<% if $Image %>
						<img src="$Image.Fill(300,400).URL" class="img-responsive">
					<% end_if %>
                </div>
				<div class="col-md-7">
                    <h2>$Title</h2>
					<h4>$Position</h4>

					<dl class="dl-horizontal">
						<% if $Email %>
							<dt>Email</dt>
							<dd><a href="mailto:{$Email.ATT}">$Email</a></dd>
						<% end_if %>
						<% if $Phone %>
							<dt>Phone</dt>
							<dd><a href="tel:{$Phone.ATT}">$Phone</a></dd>
						<% end_if %>
						<% if $Mobile %>
                            <dt>Mobile</dt>
                            <dd><a href="tel:{$Mobile.ATT}">$Mobile</a></dd>
						<% end_if %>
						<% if $Fax %>
                            <dt>Fax</dt>
                            <dd><a href="tel:{$Fax.ATT}">$Fax</a></dd>
						<% end_if %>
					</dl>

					<dl class="dl-horizontal">
						<% if $Website %>
							<dt>Website</dt>
							<dd><a href="$Website.ATT" target="_blank">$Website</a></dd>
						<% end_if %>
						<% if $Twitter %>
                            <dt>Twitter</dt>
                            <dd><a href="$Twitter.ATT" target="_blank">$Twitter</a></dd>
						<% end_if %>
						<% if $Facebook %>
                            <dt>Facebook</dt>
                            <dd><a href="$Facebook.ATT" target="_blank">$Facebook</a></dd>
						<% end_if %>
						<% if $LinkedIn %>
                            <dt>LinkedIn</dt>
                            <dd><a href="$LinkedIn.ATT" target="_blank">$LinkedIn</a></dd>
						<% end_if %>
					</dl>

					$Content
				</div>
			</div>

			$Form
			$PageComments
        </div>
    </div>
</div>