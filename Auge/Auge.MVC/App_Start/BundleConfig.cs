using System.Web;
using System.Web.Optimization;

namespace Auge.MVC
{
    public class BundleConfig
    {
        // For more information on bundling, visit http://go.microsoft.com/fwlink/?LinkId=301862
        public static void RegisterBundles(BundleCollection bundles)
        {
            bundles.Add(new ScriptBundle("~/bundles/site").Include(
                        "~/Scripts/common.js"));

            bundles.Add(new StyleBundle("~/Content/site").Include(
                      "~/Content/Site.css"));
            
            bundles.Add(new ScriptBundle("~/bundles/js/third-party").Include(
                        "~/ThirdParty/jquery/dist/jquery-1.11.2.min.js",
                        "~/ThirdParty/jquery.validate/jquery.validate.min.js",
                        "~/ThirdParty/jquery.validate/jquery.validate.unobtrusive.min.js",
                        "~/ThirdParty/bootstrap/dist/js/bootstrap.min.js",
                        "~/ThirdParty/metisMenu/dist/metisMenu.min.js",
                        "~/ThirdParty/datatables/media/js/jquery.dataTables.min.js",
                        "~/ThirdParty/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js",
                        "~/ThirdParty/raphael/raphael-min.js",
                        "~/ThirdParty/morrisjs/morris.min.js",
                        "~/ThirdParty/sb-admin/js/sb-admin-2.js",
                        "~/ThirdParty/bootstrap-calendar-master/components/underscore/underscore-min.js",
                        "~/ThirdParty/bootstrap-calendar-master/js/calendar.min.js",
                        "~/ThirdParty/bootstrap-calendar-master/js/language/pt-BR.js"));

            bundles.Add(new StyleBundle("~/bundles/css/third-party").Include(
                      "~/ThirdParty/bootstrap/dist/css/bootstrap.min.css",
                      "~/ThirdParty/metisMenu/dist/metisMenu.min.css",
                      "~/ThirdParty/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css",
                      "~/ThirdParty/datatables-responsive/css/dataTables.responsive.css",
                      "~/ThirdParty/sb-admin/css/sb-admin-2.css",
                      "~/ThirdParty/morrisjs/morris.css",
                     // "~/ThirdParty/font-awesome/css/font-awesome.min.css",
                      "~/ThirdParty/bootstrap-calendar-master/css/calendar.min.css"));
        }
    }
}
