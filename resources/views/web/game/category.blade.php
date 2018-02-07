@include('web.layouts.header')
<div id="container" v-cloak>
    <mt-header title="游戏分类">
        <a href="/" slot="left">
            <mt-button icon="back">返回</mt-button>
        </a>
    </mt-header>

    <div id="category">
        <mt-navbar v-model="selected">
            <mt-tab-item v-for="(category, index) in categorys" :id="index">
                <img slot="icon" :src="category.src" width="30px"> @{{ category.title }}
            </mt-tab-item>
        </mt-navbar>
    </div>

    <div class="p_item pi_glist">
        <div class="glist_list">
            <ul v-infinite-scroll="loadMore" infinite-scroll-disabled="false" class="game_list_l cf">
                <li v-for="(game,index) in games">
                    <a href="javascript:void(0);" :title="game.title">
                        <img :src="game.src" :alt="game.title" class="game_icon">
                        <em class="ts_15 tc_14">@{{ game.title }}</em>
                        <span class="ts_12 tc_66">@{{ game.online_num }}人正在玩</span>
                        <span class="ts_12 tc_66">@{{ game.desc }}</span>
                    </a>
                    <a title="打开" class="game_btn tc_sr3 ts_13 br_sr3_u bs_s game_download">打开</a>
                </li>
            </ul>

            <mt-spinner type="fading-circle" v-bind:class="{ hide: isHide }" :size="40"></mt-spinner>
        </div>
    </div>
</div>
@include('web.layouts.footer')

<script>
    var container = new Vue({
        el: '#container',
        data: ({
            'isHide': true,
            'selected': 0,
            'categorys': [
                {title: '角色', src: 'http://img.qidian.com/upload/gamesy/2017/12/14/20171214102946lw0w0nrs5e.jpg'},
                {title: '塔防', src: 'http://img.qidian.com/upload/gamesy/2017/12/15/20171215121826t9ex0qihfj.jpg'},
                {title: '经营', src: 'http://img2.qidian.com/upload/gamesy/2017/12/11/20171211101025t2lajhm9st.jpg'},
                {title: '角色', src: 'http://img.qidian.com/upload/gamesy/2017/12/14/20171214102946lw0w0nrs5e.jpg'},
                {title: '塔防', src: 'http://img.qidian.com/upload/gamesy/2017/12/15/20171215121826t9ex0qihfj.jpg'},
                {title: '角色', src: 'http://img.qidian.com/upload/gamesy/2017/12/14/20171214102946lw0w0nrs5e.jpg'},
                {title: '塔防', src: 'http://img.qidian.com/upload/gamesy/2017/12/15/20171215121826t9ex0qihfj.jpg'},
                {title: '经营', src: 'http://img2.qidian.com/upload/gamesy/2017/12/11/20171211101025t2lajhm9st.jpg'},
                {title: '角色', src: 'http://img.qidian.com/upload/gamesy/2017/12/14/20171214102946lw0w0nrs5e.jpg'},
                {title: '塔防', src: 'http://img.qidian.com/upload/gamesy/2017/12/15/20171215121826t9ex0qihfj.jpg'},
            ],
            'banners': [
                {title: '卡德里亚道具屋', src: 'http://img.qidian.com/upload/gamesy/2017/12/14/20171214102946lw0w0nrs5e.jpg'},
                {title: '灵妖记', src: 'http://img.qidian.com/upload/gamesy/2017/12/15/20171215121826t9ex0qihfj.jpg'},
                {title: '莽荒天下', src: 'http://img2.qidian.com/upload/gamesy/2017/12/11/20171211101025t2lajhm9st.jpg'},
            ],
            'games': [
                {title: '卡德里亚道具屋', src: 'http://img0.qidian.com/upload/gamesy/2017/12/13/20171213173423x0sv4wg9id.png', desc: '幻想世界 商业大亨', online_num: 123123},
                {title: '灵妖记', src: 'http://img1.qidian.com/upload/gamesy/2017/12/11/20171211145021mvymkzedgq.png', desc: '神仙有灵 妖亦有道', online_num: 34534},
                {title: '莽荒天下', src: 'http://img.qidian.com/upload/gamesy/2017/12/08/20171208152354zbfss0nki4.png', desc: '携手战天下 执剑决莽荒', online_num: 4564},
                {title: '卡德里亚道具屋', src: 'http://img0.qidian.com/upload/gamesy/2017/12/13/20171213173423x0sv4wg9id.png', desc: '幻想世界 商业大亨', online_num: 123123},
                {title: '灵妖记', src: 'http://img1.qidian.com/upload/gamesy/2017/12/11/20171211145021mvymkzedgq.png', desc: '神仙有灵 妖亦有道', online_num: 34534},
                {title: '莽荒天下', src: 'http://img.qidian.com/upload/gamesy/2017/12/08/20171208152354zbfss0nki4.png', desc: '携手战天下 执剑决莽荒', online_num: 4564},
                {title: '卡德里亚道具屋', src: 'http://img0.qidian.com/upload/gamesy/2017/12/13/20171213173423x0sv4wg9id.png', desc: '幻想世界 商业大亨', online_num: 123123},
                {title: '灵妖记', src: 'http://img1.qidian.com/upload/gamesy/2017/12/11/20171211145021mvymkzedgq.png', desc: '神仙有灵 妖亦有道', online_num: 34534},
                {title: '莽荒天下', src: 'http://img.qidian.com/upload/gamesy/2017/12/08/20171208152354zbfss0nki4.png', desc: '携手战天下 执剑决莽荒', online_num: 4564},
                {title: '卡德里亚道具屋', src: 'http://img0.qidian.com/upload/gamesy/2017/12/13/20171213173423x0sv4wg9id.png', desc: '幻想世界 商业大亨', online_num: 123123},
            ],
        }),
        methods: {
            loadMore() {
                if (this.isHide == false) {
                    return false;
                }

                this.isHide = false;
                setTimeout(() => {
                    let last = this.games[1];
                    this.games.push(last);

                    this.isHide = true;
                }, 2500);
            }
        }
    })
</script>