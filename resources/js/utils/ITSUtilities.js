/**
 * Indie Tech Solutions
 *
 * Utilities Lib
 *
 */

/**
 * Usefull Helpers
 */
export class ITSHelpers {
  /**
   * This prevents the page from scrolling down to where it was previously.
   */
  static backToTopOnReload() {
    if ("scrollRestoration" in history) {
      history.scrollRestoration = "manual";
    }

    window.scrollTo(0, 0);
  }

  /**
   * force all external to open in new tab
   */

  static forceExternalLinks() {
    for (var links = document.links, i = 0, a; (a = links[i]); i++) {
      if (a.host !== location.host) {
        a.target = "_blank";
        a.rel="noreferrer"
      }else{
        a.rel="noopener"
      }
    }
  }

  /**
   * Workaround to prevent broken wp plugins
   *
   * @param {*} container
   */
  static vueFixWpPlugins(container) {
    // look for styles inside vue elements
    const styles = container.querySelectorAll("style");
    // look for scripts inside vue elements
    const scripts = container.querySelectorAll("script");
    // just for gravity iform
    const iframes = container.querySelectorAll("iframe[name*='gform_ajax_']");

    if (scripts.length > 0) {
      for (const script of scripts) {
        document.body.appendChild(script);
      }
    }

    if (styles.length > 0) {
      for (const style of styles) {
        document.body.appendChild(style);
      }
    }

    if (iframes.length > 0) {
      for (const iframe of iframes) {
        document.body.appendChild(iframe);
      }
    }
  }
}
