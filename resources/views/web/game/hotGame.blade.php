@include('web.layouts.header')

<div id="container" v-cloak>
    <mt-header title="热门游戏">
        <a href="/" slot="left">
            <mt-button icon="back">返回</mt-button>
        </a>
    </mt-header>

    <div class="p_item pi_glist">
        <div class="glist_list">
            <ul v-infinite-scroll="loadMore" infinite-scroll-disabled="false" class="game_list_l cf">
                <li v-for="(newGame,index) in newGames">
                    <a href="javascript:void(0);" :title="newGame.title">
                        <img :src="newGame.icon" :alt="newGame.title" class="game_icon">
                        <em class="ts_15 tc_14">@{{ newGame.title }}</em>
                        <span class="ts_12 tc_66">@{{ newGame.online_num }}人正在玩</span>
                        <span class="ts_12 tc_66">@{{ newGame.desc }}</span>
                    </a>
                    <a title="打开" class="game_btn tc_sr3 ts_13 br_sr3_u bs_s game_download">打开</a>
                </li>
            </ul>

            <mt-spinner type="fading-circle" v-bind:class="{ hide: isHide }" :size="40"></mt-spinner>
        </div>
    </div>
</div>

</body>
</html>


<script type="text/javascript">
    var container = new Vue({
        el: '#container',
        data: {
            'pUrl': "{{ url('hotGame?p=1') }}",
            'isHide': true,
            'newGames': [],
        },
        methods: {
            loadMore() {
                if (this.isHide == false) {
                    return false;
                }

                if (this.pUrl == null || this.pUrl == "") {
                    return false;
                }

                this.isHide = false;
                axios.get(this.pUrl).then((response) => {
                    var result = response.data;
                    var data = result.data;

                    this.pUrl = result.next_page_url;
                    for (item in data) {
                        this.newGames.push(data[item]);
                    }

                    this.isHide = true;
                }).catch((error) => {
                    this.$toast("获取数据失败");
                    this.isHide = true;
                });
            }
        },
        beforeCreate(){
        }
    });
</script>