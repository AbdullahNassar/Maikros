<template>
    <div class="dropdown">
        <a href="" class="nav-link pd-x-7 pos-relative" data-toggle="dropdown">
          <i class="icon ion-ios-bell-outline tx-24"></i>
          <!-- start: if statement -->
          <span>{{unreadNotifications.length}}</span>
          <!-- end: if statement -->
        </a>
        <div class="dropdown-menu dropdown-menu-header wd-300 pd-0-force">
          <div class="d-flex align-items-center justify-content-between pd-y-10 pd-x-20 bd-b bd-gray-200">
            <label class="tx-12 tx-info tx-uppercase tx-semibold tx-spacing-2 mg-b-0">Notifications</label>
            <a @click="markNotificationAsRead" class="tx-11">Mark All as Read</a>
          </div><!-- d-flex -->

          <div class="media-list">
            <!-- loop starts here -->
            <notification-item v-for="unread in unreadNotifications" :unread="unread" :key="unread.id"></notification-item>
            <!-- loop ends here -->
            <!-- loop starts here -->
            <notification-item v-for="read in readNotifications" :read="read" :key="read.id"></notification-item>
            <!-- loop ends here -->
            <div class="pd-y-10 tx-center bd-t">
              <a href="" class="tx-12"><i class="fa fa-angle-down mg-r-5"></i> Show All Notifications</a>
            </div>
          </div><!-- media-list -->
        </div><!-- dropdown-menu -->
      </div><!-- dropdown -->
</template>

<script>
    import NotificationItem from './NotificationItem.vue';
    export default {
        props: ['unreads','reads', 'userid'],
        components: {NotificationItem},
        data(){
            return {
                unreadNotifications: this.unreads,
                readNotifications: this.reads
            }
        },
        methods: {
            markNotificationAsRead() {
                if (this.unreadNotifications.length) {
                    axios.get('/markAsRead');
                }
            }
        },
        mounted() {
            console.log('Component mounted.');
            Echo.private('App.User.' + this.userid)
                .notification((notification) => {
                    console.log(notification);
                    let newUnreadNotifications = {data: {thread: notification.thread, user: notification.user}};
                    this.unreadNotifications.push(newUnreadNotifications);
                    let newreadNotifications = {data: {thread: notification.thread, user: notification.user}};
                    this.readNotifications.push(newUnreadNotifications);
                });
        }
    }
</script>
