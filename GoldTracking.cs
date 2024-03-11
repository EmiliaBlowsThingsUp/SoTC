namespace SoTC
{
    public class GoldTracking
    {
        public int Id { get; set; }

        public string Name { get; set; }

        public decimal GoldLastSession { get; set; }

        public string GoldThisSession { get; set; }

        public string ImageUrl { get; set; }

        public string GetFormattedBasePrice() => GoldLastSession.ToString("0.00");
    }
}
