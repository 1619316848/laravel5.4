<template>
     <div>
        <x-img default-src="http://img2.imgtn.bdimg.com/it/u=1078558955,3483428395&fm=26&gp=0.jpg" style="width: 100%"></x-img>
        <search placeholder="点此搜索"></search>
        <group-title>第一期投票</group-title>
        <grid :rows="1">
          <grid-item v-for="i in 1" :key="i">
            <img src="http://placeholder.qiniudn.com/60x60/3cc51f/ffffff" alt="">
            <span class="id">编号：6666</span>
            <h4 class="name">名字</h4>
            <span class="ticket"><strong>6666</strong>票</span>
            <x-button class="vote" type="primary"> 投票 </x-button>
          </grid-item>
        </grid>
    </div>
</template>

<script>
    import { Search, Grid, GridItem, GroupTitle, XImg, Panel, XButton } from 'vux'

    export default {
        data () {
          return {
            type: '5',
            list: [
            {
                src: 'http://placeholder.qiniudn.com/60x60/3cc51f/ffffff',
                title: '标题二',
                desc: '由各种物质组成的巨型球状天体，叫做星球。星球有一定的形状，有自己的运行轨道。',
                url: {
                    path: '/component/radio',
                    replace: false
            },
                meta: {
                    source: '来源信息',
                    date: '时间',
                    other: '其他信息'
                }
            }],
                footer: {
                    title: '查看更多',
                    url: 'http://vux.li'
            }
          }
        },
        components: {
            Search,
            Grid,
            GridItem,
            GroupTitle,
            XImg,
            Panel,
            XButton
        },
    }
</script>

<style scoped>
    .id{
        color: #5e5e5e;
        vertical-align: top;
        position: absolute;
        left: 88px;
    }
    .name{
        display: inline-block;
        color: black;
        position: absolute;
        left: 88px;
        top: 40px;
    }
    .ticket{
        position: absolute;
        right: 165px;
        top: 59px;
        color: #5e5e5e;
    }
    .vote{

    }
    .grid-center {
      display: block;
      text-align: center;
      color: #666;
    }
</style>
