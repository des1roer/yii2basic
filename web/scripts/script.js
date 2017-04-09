Vue.component('modal', {
    template: '#modal-template',
})

var vm = new Vue({
    el: '#app',

    data: {
        loger: '',
        showModal: false,
        user: {
            name: 'user',
            hp: 1000,
            atk: 100
        },
        empty: {
            name: 'empty',
            hp: 1000,
            atk: 100
        },
        even: Math.random() < 0.5
    },
    methods: {
        open: function (data) {
            this.showModal = true;
        },
        fight: function (data) {
            if (this.user.hp < 0 || this.empty.hp < 0) {
                return false;
            }
            if (this.even) {
                this.atk(this.user, this.empty, true);
                this.atk(this.empty, this.user, false);
                this.loger += '<br>';
            } else {
                this.atk(this.empty, this.user, false);
                this.atk(this.user, this.empty, true);
                this.loger += '<br>';
            }
//            (this.even) ? this.atk(this.user, this.empty, this.even) : this.atk(this.empty, this.user, this.even);

            this.even = !this.even;
//            var dmg = Math.round(randomInteger(0.9, 1.1) * this.empty.atk);
//            this.user.hp -= dmg;
//            this.loger += '<div>User ' + this.user.hp + ' - ' + dmg + '</div>';
//            if (this.user.hp <= 0) {
//                this.loger += ' Winner Empty';
//                return false;
//            }
//
//            dmg = Math.round(randomInteger(0.9, 1.1) * this.user.atk);
//            this.empty.hp -= dmg;
//            this.loger += '<div>Empty ' + this.empty.hp + ' - ' + dmg + '</div><br>';
//            if (this.empty.hp <= 0) {
//                this.loger += ' Winner User';
//                return false;
//            }
        },
        atk: function (user_, empty_, even) {
            if (this.user.hp < 0 || this.empty.hp < 0) {
                return false;
            }
            var nick = 'Empty ', e_nick = 'User ';
            if (even) {
                var buf = nick;
                nick = e_nick, e_nick = buf;
            }

            var dmg = Math.round(random(0.9, 1.1) * user_.atk);
            empty_.hp -= dmg;
            this.loger += '<div>' + e_nick + empty_.hp + ' - ' + dmg + '</div>';

            if (empty_.hp <= 0) {
                this.loger += ' Winner ' + nick;
                return false;
            }
        }
    }
})

function random(min, max) {
    var rand = min + Math.random() * (max - min)
    return rand;
}

$(document).keyup(function (e) {
    if (e.keyCode == 27) { // escape key maps to keycode `27`
        vm.showModal = false
    }
    if (e.keyCode == 13) { // escape key maps to keycode `27`
        vm.fight()
    }
});