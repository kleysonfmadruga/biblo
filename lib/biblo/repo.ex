defmodule Biblo.Repo do
  use Ecto.Repo,
    otp_app: :biblo,
    adapter: Ecto.Adapters.Postgres
end
