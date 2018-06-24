				<div id="halosidebar" class="sidebar" role="complementary">

					<div class="panel">
				
						<?php if ( is_active_sidebar( 'halosidebar' ) ) : ?>

							<?php dynamic_sidebar( 'halosidebar' ); ?>

						<?php else : ?>

							<!-- This content shows up if there are no widgets defined in the backend. -->
							
							<div class="alert-box">Please activate some Widgets.</div>

						<?php endif; ?>

					</div>

				</div>