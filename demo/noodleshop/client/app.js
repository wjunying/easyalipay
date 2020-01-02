import {
  getAuthCode,
  getUserInfo,
} from './utils/api';

App({
  userId: null,
  async getUserId() {
    if (this.userId) {
      return this.userId;
    }

    const authCode = await getAuthCode('auth_user');
    const { userId } = await getUserInfo(authCode);
    this.userId = userId;
    return userId;
  },
  onLaunch(options) {
    // 第一次打开
    // options.query == {number:1}
    console.info('App onLaunch');
  },
  onShow(options) {
    // 从后台被 scheme 重新打开
    // options.query == {number:1}
  },
});
