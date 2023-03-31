export default {
  methods: {
    getParam(url) {
      const paramUrl = url.split("?");
      if (paramUrl.length == 1) {
        return {};
      }
      const param = (function (a) {
        if (a == "") return {};
        var b = {};
        for (var i = 0; i < a.length; ++i) {
          var p = a[i].split('=', 2);
          if (p.length == 1)
            b[p[0]] = "";
          else
            b[p[0]] = decodeURIComponent(p[1].replace(/\+/g, " "));
        }
        return b;
      })(paramUrl[1].split('&'));
      return param;
    },
    encodedStr(rawStr) { 
      return rawStr.replace(/[\u00A0-\u9999<>\&]/g, function (i) {
        return '&#' + i.charCodeAt(0) + ';';
      })
    },
    decodeHTMLEntities(str) {
      var element = document.createElement('div');
      if (str && typeof str === 'string') {
        // strip script/html tags
        str = str.replace(/<script[^>]*>([\S\s]*?)<\/script>/gmi, '');
        str = str.replace(/<\/?\w(?:[^"'>]|"[^"]*"|'[^']*')*>/gmi, '');
        element.innerHTML = str;
        str = element.textContent;
        element.textContent = '';
      }

      return str;
    },
    mailto(email) {
      return `mailto:${email}`;
    },
    range(start, stop, step = 1) {
      var a = [start],
        b = start;
      step = step || 1;
      while (b < stop) {
        a.push((b += step));
      }
      return a;
    },
    moneyFormatUSA(number) {
      return new Intl.NumberFormat('en-US').format(number);
    },
    componentToHex(c) {
      var hex = c.toString(16);
      return hex.length == 1 ? "0" + hex : hex;
    },
    hexToRgb(hex) {
      // Expand shorthand form (e.g. "03F") to full form (e.g. "0033FF")
      var shorthandRegex = /^#?([a-f\d])([a-f\d])([a-f\d])$/i;
      hex = hex.replace(shorthandRegex, function (m, r, g, b) {
        return r + r + g + g + b + b;
      });

      var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
      return result ? parseInt(result[1], 16) + "," + parseInt(result[2], 16) + "," + parseInt(result[3], 16) : null;
    },
    capitalizeWord(tag) {
      let lower = tag.toLowerCase();
      let lowerArr = lower.split(" ");
      let finalArr = [];
      for (let i = 0; i < lowerArr.length; i++) {
        finalArr.push(
          lowerArr[i].charAt(0).toUpperCase() + lowerArr[i].slice(1)
        );
      }
      return finalArr.join("");
    },
    groupBy(list, keyGetter) {
      const map = new Map();
      list.forEach((item) => {
        const key = keyGetter(item);
        const collection = map.get(key);
        if (!collection) {
          map.set(key, [item]);
        } else {
          collection.push(item);
        }
      });
      return Array.from(map, ([name, value]) => ({
        name,
        value,
      }));
    },
    generateBreadCrumb(data) {
      let html = "";
      data.forEach((item, key) => {
        // console.log(item,key);
        if (key != 0) {
          html += '<span class = "mb-2" > > </span>';
        }
        if (item.url != false && item.url != null)
          html += `<a href="${item.url}" class="btn-link">${item.label}</a>`;
        else html += item.label;
      });
      return html;
    },
    guidGenerator() {
      var S4 = function() {
         return (((1+Math.random())*0x10000)|0).toString(16).substring(1);
      };
      return (S4()+S4()+"-"+S4()+"-"+S4()+"-"+S4()+"-"+S4()+S4()+S4());
    }
  }
};
