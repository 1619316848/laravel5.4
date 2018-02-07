@include('web.layouts.header')
<div id="container" v-cloak>

<mt-header title="详情">
    <a href="/" slot="left">
        <mt-button icon="back">返回</mt-button>
    </a>
</mt-header>

<section class="p_cont">
    <div class="p_item pi_game">
        <div class="game_head">
            <div class="game_icon"><img v-bind:src="icon" v-bind:alt="title" width="64" height="64"></div>
            <p class="game_name ts_18 tc_ff"><span class="tc_14">@{{ title }}</span>
            </p>
            <p class="game_info ts_14 tc_99"><span>@{{ abstract }}</span></p>
            <p class="game_user ts_12 tc_cc"><span>@{{ amount }}人玩过</span></p>
        </div>
    </div>

    <div class="p_item pi_intro">
        <div class="intro_view YWGM_STAT YWGMS_stat_game_detail_pics">
            <ul class="cf" style="width: 690px;">
                <li v-for="(screen, index) in screens" style="display: list-item;" v-on:click="showBigImg">
                    <img :src="screen.src" :alt="screen.title">
                </li>
            </ul>
        </div>
        <div class="intro_view_detail" v-bind:class="{ hide: isHide }">
            <mt-header v-bind:title="title">
                <a href="javascript:;" slot="left" v-on:click="hideBigImg">
                    <mt-button icon="back">返回</mt-button>
                </a>
            </mt-header>
            <div style="margin: 0 auto;height: calc(100% - 40px)">
                <mt-swipe :auto="0">
                    <mt-swipe-item v-for="(screen, index) in screens"><img :src="screen.src" :alt="screen.title" style="max-width:100%;max-height: 100%"></mt-swipe-item>
                </mt-swipe>
            </div>
        </div>

        <div class="intro_text ts_13 tc_66" style="height: 115px;">
            @{{ desc }}
        </div>
    </div>
    <!--推荐游戏-->
    <div class="p_item pi_same">
        <div class="p_title">
            <h2 class="ts_16 tc_14">@{{ title }}的人也在玩</h2>
            <i class="bc_sr2 pt_dec"></i>
        </div>
        <div class="same_list">
            <ul class="game_list_s cf">
                <li v-for="(item, index) in rc">
                    <a :href="getUrl(item.id)" :title="item.title">
                        <img :src="item.icon" alt="item.title" class="game_icon">
                        <em class="ts_15 tc_14">@{{ item.title }}</em>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</section>
</div>
</body>
</html>


<script>
    var container = new Vue({
        el: '#container',
        data: {
            'isHide': true,
            'icon' : "{!! $list['icon'] !!}",
            'title' : "{!! $list['title'] !!}",
            'abstract' : "{!! $list['abstract'] !!}",
            'desc' : "{!! $list['desc'] !!}",
            'amount' : "{!! $list['amount'] !!}",
            'screens': {!! $list['screen'] !!},
            'rc': {!! $rc !!},
        },
        methods: {
            getUrl: function(param){
                return "{{ url('game/detail') }}/" + param;
            },
            showBigImg: function() {
                this.isHide = false;
            },
            hideBigImg: function() {
                this.isHide = true;
            }
        }
    })
</script>