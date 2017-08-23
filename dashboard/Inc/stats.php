<div class="row-fluid">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Statistics</div>
        </div>
        <div class="block-content collapse in">
            <div class="span3 text-center">
                <div class="chart btn btn-default btn-lg" style="font-size: 35px; padding: 30px 50px;"><?php echo $user->getNumberMessageSentToday(); ?></div>
                <div class="chart-bottom-heading"><span class="label label-info">SMS envoyé aujourd'hui</span>

                </div>
            </div>
            <div class="span3 text-center">
                <div class="chart btn btn-default btn-lg" style="font-size: 35px; padding: 30px 50px;"><?php echo $user->remaining_message ;?></div>
                <div class="chart-bottom-heading"><span class="label label-info">SMS restants</span>

                </div>
            </div>
            <div class="span3 text-center">
                <div class="chart btn btn-default btn-lg" style="font-size: 35px; padding: 30px 50px;"><?php echo $user->getNumberMessageSent() ?></div>
                <div class="chart-bottom-heading"><span class="label label-info">Total SMS envoyés</span>

                </div>
            </div>
            <div class="span3 text-center">
                <div class="chart btn btn-default btn-lg" style="font-size: 35px; padding: 30px 50px;"><?php echo $user->getRechargement() ?></div>
                <div class="chart-bottom-heading"><span class="label label-info">Total SMS réchargés</span>

                </div>
            </div>
        </div>
    </div>
    <!-- /block -->
</div>
