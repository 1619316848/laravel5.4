    <div style="height: 55px"></div>
    <div id="footer">
        <mt-tabbar fixed v-model="selected" :click="gotoUrl()">
            <mt-tab-item id="game">
                <img slot="icon" src="{{ asset('images/n_icons_1.png') }}">
                游戏
            </mt-tab-item>
            <mt-tab-item id="active">
                <img slot="icon" src="{{ asset('images/n_icons_3.png') }}">
                笑话
            </mt-tab-item>
            {{--<mt-tab-item id="ucenter">--}}
                {{--<img slot="icon" src="{{ asset('images/n_icons_4.png') }}">--}}
                {{--我的--}}
            {{--</mt-tab-item>--}}
        </mt-tabbar>
    </div>

    </body>
</html>

<script>
    var footer = new Vue({
        el: '#footer',
        data: ({
            'selected': "{{ $tab }}",
        }),
        methods: ({
            gotoUrl () {
                var tab = "{{ $tab }}";

                if (tab == this.selected) {
                    return false;
                }

                if (this.selected == "category") {
                    window.location.href = "{{ url('game/category') }}";
                } else if (this.selected == "game") {
                    window.location.href = "{{ url('/') }}";
                }
            },
        })
    });
</script>