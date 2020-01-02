import {
  getOrderList,
  refundOrder,
} from '../../utils/api';

Page({
  data: {
    orderList: [],
    loading: true,
  },
  async onLoad() {
    const app = getApp();
    this.userId = await app.getUserId();

    this.requestData();
  },
  async requestData() {
    my.showLoading();

    let responseList = [];
    try {
      responseList = await getOrderList(this.userId);
    } catch (error) {
      my.showToast({
        content: '获取订单列表失败',
      });
    }

    const orderList = responseList.map((item) => {
      const orderQuery = item.alipayTradeQueryResponse;
      let goodsList = [];
      try {
        goodsList = JSON.parse(item.goodsDetail);
      } catch (error) {}

      return {
        goodsList,
        cardId: item.cardId,
        outTradeNo: orderQuery.outTradeNo,
        tradeNo: orderQuery.tradeNo,
        status: orderQuery.tradeStatus,
        totalAmount: orderQuery.totalAmount,
      };
    });

    this.setData({
      orderList,
      loading: false,
    });

    my.hideLoading();
  },
  async refundHandler(e) {
    my.showLoading();
    const { order } = e.target.dataset;

    try {
      await refundOrder(order.tradeNo, order.totalAmount);
    } catch (error) {
      my.hideLoading();
      my.showToast({
        content: `退款失败: ${error.subMsg || error.msg}`,
      });
      return;
    }

    my.hideLoading();
    my.showToast({
      content: '退款成功',
    });

    this.requestData();
  },
});
