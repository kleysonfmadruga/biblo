defmodule Biblo.Copy do
  @moduledoc """
    Biblo.Copy
  """

  use Ecto.Schema

  import Ecto.Changeset
  alias Biblo.{Book, Loaning}

  @primary_key{:id, :binary_id, autogenerate: true}
  @required_params [:copy_code, :book]

  schema "copies" do
    field :copy_code, :string
    belongs_to :book, Book
    has_one :loaning, Loaning

    timestamps()
  end

  def changeset(params) do
    %__MODULE__{}
    |> cast(params, @required_params)
    |> validate_required(@required_params)
  end
end
