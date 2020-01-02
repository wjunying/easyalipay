const API_HOST = 'https://demo.antcloud-miniprogram.com';
// 外部系统交易号，具有唯一性，此处简单生成仅供 Demo 示例
const getOutTradeNo = () => `demo_${Math.random().toString(10).slice(2)}`;

/**
 * JSAPI getAuthCode
 */
export function getAuthCode(scopes) {
  return new Promise((resolve, reject) => {
    my.getAuthCode({
      scopes,
      success: (res) => {
        resolve(res.authCode);
      },
      fail: (error) => {
        reject(error);
      }
    });
  });
}

/**
 * 获取用户信息，如user_id
 */
export function getUserInfo(authCode) {
  return new Promise((resolve, reject) => {
    const url = `${API_HOST}/alipay/demo/alipayUserInfo`;
    my.request({
      url,
      data: {
        authCode,
      },
      success: (res) => {
        if (!res.data.success) {
          reject(res);
        }
        resolve(res.data);
      },
      fail: (error) => {
        reject(error);
      }
    });
  });
}

/**
 * 获取餐厅食物列表
 */
export function getGoodsList() {
  return new Promise((resolve, reject) => {
    my.request({
      url: `${API_HOST}/alipay/demo/goodsList`,
      success: (res) => {
        resolve(res.data.goodsInfoList || []);
      },
      fail: (error) => {
        reject(error);
      },
    });
  });
}

/**
 * 下单接口
 * @param {String} userId 用户user_id
 * @param {Array} goods 选购的商品列表
 * @param {Number} totalPrice 总价
 * @param {String} cardId 使用的优惠券card_id
 */
export function makeUserOrder(userId, goods, totalPrice, cardId) {
  return new Promise((resolve, reject) => {
    my.request({
      url: `${API_HOST}/alipay/demo/userOrder`,
      method: 'POST',
      data: {
        buyer_id: userId,
        goods_detail: JSON.stringify(goods),
        subject: 'demo测试',
        total_amount: totalPrice,
        out_trade_no: getOutTradeNo(),
        card_id: cardId,
      },
      headers: {
        'content-type': 'application/x-www-form-urlencoded'
      },
      success: (res) => {
        const { code, tradeNo } = res.data;
        if (code === '10000') {
          resolve({
            tradeNo,
          });
        } else {
          reject(res);
        }
      },
      fail: (error) => {
        reject(error);
      }
    });
  });
}

/**
 * 获取用户订单列表
 */
export function getOrderList(userId) {
  return new Promise((resolve, reject) => {
    my.request({
      url: `${API_HOST}/alipay/demo/userOrderList`,
      data: {
        user_id: userId,
      },
      success: (res) => {
        if (res.data.success) {
          resolve(res.data.userOrderResponseList || []);
        } else {
          reject(res.data);
        }
      },
      fail: (error) => {
        reject(error);
      }
    })
  });
}

export function refundOrder(tradeNo, amount) {
  return new Promise((resolve, reject) => {
    my.request({
      url: `${API_HOST}/alipay/demo/alipayTradeRefund`,
      data: {
        trade_no: tradeNo,
        refund_amount: amount,
      },
      success: (res) => {
        const { data } = res;
        data.code === '10000' ? resolve(data) : reject(data);
      },
      fail: (error) => {
        reject(error);
      }
    });
  });
}

/**
 * 领取券
 */
export function getUserCard(userId, tradeNo) {
  return new Promise((resolve, reject) => {
    my.request({
      url: `${API_HOST}/alipay/demo/alipayPassInstanceAdd`,
      data: {
        user_id: userId,
        out_trade_no: tradeNo,
      },
      success: (res) => {
        const { data } = res;
        data.code === '10000' ? resolve(data) : reject(data);
      },
      fail: (error) => {
        reject(error);
      }
    });
  });
}

/**
 * 获取用户券的列表
 */
export function getCardList(userId) {
  return new Promise((resolve, reject) => {
    my.request({
      url: `${API_HOST}/alipay/demo/userCard`,
      data: {
        user_id: userId,
      },
      headers: {
        'content-type': 'application/x-www-form-urlencoded'
      },
      success: (res) => {
        resolve((res.data.userCardList || []).filter(v => v.cardStatus === 'OK'));
      },
      fail: (error) => {
        reject(error);
      }
    });
  });
}

/**
 * 券核销方法
 */
export function useCard(userId, serialNumber, cardId) {
  return new Promise((resolve, reject) => {
    my.request({
      url: `${API_HOST}/alipay/demo/alipayPassInstanceUpdate`,
      data: {
        user_id: userId,
        serial_number: serialNumber,
        card_id: cardId,
      },
      success: (res) => {
        resolve(res.data);
      },
      fail: (error) => {
        reject(error);
      }
    });
  });
}
