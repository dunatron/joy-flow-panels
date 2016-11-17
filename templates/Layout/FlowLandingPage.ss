<% require css("joy-flow-panels/assets/css/app.css") %>
<div class="flow-panels-wrapper">
    <% loop $FlowPanels %>
        <a href="<% loop $PanelLink %>$AbsoluteLink<% end_loop %>" class="panel-link">
            <div class="panel $PanelType" style="background-color: $HashColor;">
                <% with $PanelImage.CroppedImage(1000, 600) %>
                    <div class="panel-img" style="background-image: url('$URL'); width:$Width; height: $Height;"></div>
                    <%--<img class="panel-img" src="$URL" width="$Width;" height="$Height;">--%>
                <% end_with %>
                <div class="flow-panel-text-wrap $ColorClass" style="background-color: $HashColor;">

                    <div class="panel-text">
                        <div class="panel-title">$PanelTitle</div>
                        $PanelText
                    </div>
                    <div class="panel-arrow"></div>
                </div>
            </div>
        </a>
    <% end_loop %>
</div>