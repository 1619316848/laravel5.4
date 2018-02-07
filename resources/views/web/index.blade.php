@include('web.layouts.header')

<div id="container" v-cloak>
    <mt-header title="好好玩"></mt-header>

    <div id="banner">
        <mt-swipe :auto="4000">
            <mt-swipe-item v-for="(banner, index) in banners">
                <a :href="banner.href"><img :src="banner.icon" :alt="banner.title" style="width:100%;height: 100%"></a>
            </mt-swipe-item>
        </mt-swipe>
    </div>

    <div class="p_item pi_populer">
        <div class="p_title">
            <h2 class="ts_16 tc_14">新游推荐</h2>
            <a href="{{ url('newGame') }}" title="更多" class="ts_12 tc_99">更多<i class="i_icon"></i></a>
            <i class="bc_sr2 pt_dec"></i>
        </div>

        <div class="populer_list">
            <ul class="game_list_s cf">
                <li v-for="(newGame, index) in newGames">
                    <a :href="getUrl(newGame.id)" :title="newGame.title">
                        <img :src="newGame.icon" :alt="newGame.title" class="game_icon">
                        <em class="ts_15 tc_14">@{{ newGame.title }}</em>
                        <span class="ts_12 tc_66">@{{ newGame.desc }}</span>
                    </a>
                    <a :href="getUrl(newGame.id)" title="打开" class="game_btn tc_sr3 ts_13 br_sr3_u bs_s game_download">打开</a>
                </li>
            </ul>
            <div class="clear_both"></div>
        </div>
    </div>

    <div v-if="ad1.id > 0" class="p_item pi_ad clear_both">
        <div class="ad_block1 ad_w1">
            <a><img :src="ad1.icon" alt="ad1.title"></a>
        </div>
    </div>

    <div class="p_item pi_adapt clear_both">
        <div class="p_title">
            <h2 class="ts_16 tc_14">热门</h2>
            <a href="{{ url('hotGame') }}" title="更多" class="ts_12 tc_99">更多<i class="i_icon"></i></a>
            <i class="bc_sr2 pt_dec"></i>
        </div>
        <div class="adapt_list">
            <ul class="game_list_l cf">
                <li v-for="(hotGame,index) in hotGames">
                    <a :href="getUrl(hotGame.id)" :title="hotGame.title">
                        <img :src="hotGame.icon" :alt="hotGame.title" class="game_icon">
                        <em class="ts_15 tc_14">@{{ hotGame.title }}</em>
                        <span class="ts_12 tc_66"><i>免安装</i>@{{ hotGame.amount }}人玩过</span>
                        <span class="ts_12 tc_66">@{{ hotGame.desc }}</span>
                    </a>
                    <a :href="getUrl(hotGame.id)" title="打开" class="game_btn tc_sr3 ts_13 br_sr3_u bs_s">打开</a>
                </li>
            </ul>
        </div>
    </div>
</div>

@include('web.layouts.footer')


<script type="text/javascript">
    var container = new Vue({
        el: '#container',
        data: {
            'banners': {!! $list['banners'] !!},
            'newGames': {!! $list['new'] !!},
            'hotGames': {!! $list['hot'] !!},
            'ad1': {!! $list['ad1'] !!},
        },
        methods: {
            getUrl: function(param){
                return "{{ url('game/detail') }}/" + param;
            }
        },
        beforeCreate(){
            width = document.body.clientWidth;
            document.getElementById("banner").style.height = (width / 1.85) + "px";
        }
    })
</script>
